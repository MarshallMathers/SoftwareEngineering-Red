<?php
/* Team: Red
 * Group: Client
 * Contributors: Ford Polia, Giles Holmes
 */

class DatabaseIO
{
    private $conn;                                                    # Connection resource

    private $servername;
    private $username;
    private $password;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "p4ssw0rd";
        $this->conn = NULL;
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    /**
     * Open DB connection, return response
     * @return Boolean
     */
    public function openConnection()
    {
        try {
            //$this->$conn = new PDO(DBHOST, DBUSER, DBPASS);
            $host = $this->servername;
            $this->conn = new PDO("mysql:host=$host;port=8080;dbname=headCountApp", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Closes DB connection, if it is open
     */
    public function closeConnection()
    {
        $this->conn = NULL;
    }

    /**
     * Send out the query to the db
     * @param String $queryStr
     * @param String[] $queryVars
     * @return mixed
     */
    private function query($queryStr, $queryVars)
    {
        $stmt = $this->conn->prepare($queryStr);
        $stmt->execute($queryVars);

        return $stmt->fetchAll();
    }

    /**
     * retrieve the data for rooms
     * @return roomData[]
     */
    public function requestRoomData()
    {
        $sql = "SELECT ? FROM Rooms ORDER BY RoomID";
        $roomIds = $this->query($sql, array("RoomID"));
        $roomNames = $this->query($sql, array("Room"));
        $roomCapacities = $this->query($sql, array("Capacity"));

        $rooms = array(RoomData::class);
        for ($i = 0; $i < sizeOf($roomIds); $i++) {
            array_push($rooms, new RoomData($roomIds[$i], $roomCapacities[$i], $roomNames[$i]));
        }
        return $rooms;
    }

    /**
     * retrieve data for users
     * @return String[]
     */
    public function requestUserList()
    {
        $sql = "SELECT ? FROM Clients ORDER BY UserID";
        $userIds = $this->query($sql, array("*"));
        return $userIds;
    }

    /**
     * Request data for room headcounts
     * @return HeadCountData[] - object for parsing headcounts
     */
    public function requestHeadCountData()
    {
        $sql = "SELECT ? FROM Forms ORDER BY FormID";
        $formIds = $this->query($sql, array("FormID"));
        $roomIds = $this->query($sql, array("RoomID"));
        $timeSlots = $this->query($sql, array("TimeslotID"));
        $headCounts = $this->query($sql, array("HeadcountCount"));
        $headCountSlots = $this->query($sql, array("HeadcountType"));
        $userIds = $this->query($sql, array("HeadcountType"));
        $timestamps = $this->query($sql, array("Timestamp"));

        $headCountData = array(HeadCountData::class);
        for ($i = 0; $i < sizeOf($formIds); $i++) {
            array_push($headCountData, new HeadCountData($roomIds[$i],
                $timeSlots[$i],
                $headCounts[$i],
                $headCountSlots[$i],
                $userIds[$i],
                $timestamps[$i]));
        }
        return $headCountData;
    }

    /**
     * Submit new room data to the db, return response
     * @param RoomData[] - room data object for query
     * @return Boolean
     */
    public function submitRoomData($roomData)
    {
        $this->conn->prepare("DELETE * FROM Rooms")->execute();
        // prepare sql and bind parameters
        $sql = "INSERT INTO Rooms (Capacity, Room, RoomID)
				VALUES (:cap, :room, :rID)";
        for ($i = 0; $i < sizeOf($roomData); $i++){
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cap', $roomData[$i].getCapacity());
            $stmt->bindParam(':room', $roomData[$i].getRoomName());
            $stmt->bindParam(':rID', $roomData[$i].getRoomID());
            $success = $stmt->execute();
            if ($success == false){
                return false;
            }
        }
        return true;
    }

    /**
     * Submit a user list to the db for acceptable users, return success
     * @param String[] - user list data for query
     * @return Boolean
     */
    public function submitUserList($userList)
    {
        $this->conn->prepare("DELETE * FROM Clients")->execute();
        // prepare sql and bind parameters
        $sql = "INSERT INTO Clients (UserID)
				VALUES (:uID)";
        for ($i = 0; $i < sizeOf($userList); $i++){
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':uID', $userList[$i]);
            $success = $stmt->execute();
            if ($success == false){
                return false;
            }
        }
        return true;
    }

    /**
     * check credentials of the user when logging in
     * @return Boolean - pass/fail
     */
    public function checkCredentials($userID)
    {
        $sql = "select ? from Admins where Username='$userID'";
        $params = array("Username");
        $res_userID = $this->query($sql, $params);

        if (count($res_userID) < 1) {
            return false;
        } else {
            return true;
        }
    }
}