<?php
/* Team: Red
 * Group: Client
 * Contributors: Ford Polia, Giles Holmes
 */

class DatabaseIO
{
    public $databaseConnection;                                                    # Connection resource

    private $serverName;
    private $databaseUsername;
    private $databasePassword;
    private $databaseName;

    public function __construct()
    {
        $this->serverName = "localhost";
        $this->databaseUsername = "root";
        $this->databasePassword = "p4ssw0rd";
        $this->databaseName = "headCountApp";
        $this->databaseConnection = NULL;
    }

    public function __destruct()
    {
        $this->closeConnectionIfOpen();
    }

    /**
     * Open DB connection, return response
     * @return Boolean - true if connection successfully opened, false otherwise
     */
    public function openConnectionAndReportSuccess()
    {
        try {
            $this->databaseConnection = new PDO("mysql:host=" . $this->serverName . ";dbname=" . $this->databaseName,
                $this->databaseUsername,
                $this->databasePassword);
            // Set the PHP Data Object (PDO) error mode to exception
            $this->databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connection successfully established";
            return true;
        } catch (PDOException $databaseConnectionException) {
            echo "Database Connection failed: " . $databaseConnectionException->getMessage();
            return false;
        }
    }

    public function closeConnectionIfOpen()
    {
        $this->databaseConnection = NULL;
    }

    /**
     * Send out the query to the db
     * @param String $queryStr
     * @param String[] $queryVars
     * @return mixed
     */
    private function performQuery($queryStr, $queryVars)
    {
        $stmt = $this->databaseConnection->prepare($queryStr);
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
        $roomIds = $this->performQuery($sql, array("RoomID"));
        $roomNames = $this->performQuery($sql, array("Room"));
        $roomCapacities = $this->performQuery($sql, array("Capacity"));

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
        $userIds = $this->performQuery($sql, array("*"));
        return $userIds;
    }

    /**
     * Request data for room headcounts
     * @return HeadCountData[] - object for parsing headcounts
     */
    public function requestHeadCountData()
    {
        $sql = "SELECT ? FROM Forms ORDER BY FormID";
        $formIds = $this->performQuery($sql, array("FormID"));
        $roomIds = $this->performQuery($sql, array("RoomID"));
        $timeSlots = $this->performQuery($sql, array("TimeslotID"));
        $headCounts = $this->performQuery($sql, array("HeadcountCount"));
        $headCountSlots = $this->performQuery($sql, array("HeadcountType"));
        $userIds = $this->performQuery($sql, array("HeadcountType"));
        $timestamps = $this->performQuery($sql, array("Timestamp"));

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
        $this->databaseConnection->prepare("DELETE * FROM Rooms")->execute();
        // prepare sql and bind parameters
        $sql = "INSERT INTO Rooms (Capacity, Room, RoomID)
				VALUES (:cap, :room, :rID)";
        for ($i = 0; $i < sizeOf($roomData); $i++) {
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->bindParam(':cap', $roomData[$i] . getCapacity());
            $stmt->bindParam(':room', $roomData[$i] . getRoomName());
            $stmt->bindParam(':rID', $roomData[$i] . getRoomID());
            $success = $stmt->execute();
            if ($success == false) {
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
        $this->databaseConnection->prepare("DELETE * FROM Clients")->execute();
        // prepare sql and bind parameters
        $sql = "INSERT INTO Clients (UserID)
				VALUES (:uID)";
        for ($i = 0; $i < sizeOf($userList); $i++) {
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->bindParam(':uID', $userList[$i]);
            $success = $stmt->execute();
            if ($success == false) {
                return false;
            }
        }
        return true;
    }

    /**
     * check credentials of the user when logging in
     * @param $userID
     * @return Boolean - pass/fail
     */
    public function checkLoginCredentials($userID)
    {
        $sql = "select ? from Admins where Username='$userID'";
        $params = array("Username");
        $res_userID = $this->performQuery($sql, $params);

        if (count($res_userID) < 1) {
            return false;
        } else {
            return true;
        }
    }
}