<?php
/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Thomas Cox
 */
 
 require("../../../database/dbconfig.php");
 if (isset($link)) {
 	$link->close();
 	$link=NULL;
 }
 
 class DatabaseIO {
	private $conn;													# Connection resource
	
	private $servername;
	private $username;
	private $password;
	
	public function __construct() {
		$this->servername = "127.0.0.1";
		$this->username = "root";
		$this->password = "p4ssw0rd";
		$this->conn = NULL;
	}
		
	public function __destruct() {
		$this->closeConnection();
	}
	
	// Opens a connection to the database. Returns TRUE if successful, FALSE otherwise. 
	public function openConnection() {
		try {
    		$this->$conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    		//$this->conn = new PDO("sqlite:".__DIR__."../../../database/headCountApp.db");
    		//:host=".$host.";dbname=headCountApp.db", $this->$username, $this->$password);
   			// set the PDO error mode to exception
    		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
    	}
	}
	
	// Closes the connection, if it is open
	public function closeConnection() {
		$this->conn = NULL;
	}
	
	// Submits the headcount data in the $data param of type FormData.
	public function submitHeadCountData($data) {
		/*
		INSERT INTO Form (RoomID, TimeslotID, HeadcountType,
			HeadcountCount, UserID, Timestamp)
		VALUES (?,?,?,?,?,?) 		
		*/
		
		// prepare sql and bind parameters
		$sql = "INSERT INTO Forms (RoomID, TimeslotID, headcountType, HeadcountCount, UserID, Timestamp) VALUES (:rID, :tsID, :hcT, :hcC, :uID, :ts);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':rID', $data["room_ID"]);
		$stmt->bindParam(':tsID', $data["time_slot"]);
		$stmt->bindParam(':hcT', $data["head_count_slot"]);
		$stmt->bindParam(':hcC', $data["head_count"]);
		$stmt->bindParam(':uID', $data["user_ID"]);
		$stmt->bindParam(':ts', $data["time_stamp"]);

		// insert a row
		return $stmt->execute();
	}
	
	// Returns a FormData object with the form-data attributes set from the database
	public function requestFormData() {
		// Room_IDS and TimeSlots
		$sql = "SELECT * FROM Rooms";
		$res_rooms = $this->query($sql, array());
		
		$sql = "SELECT * FROM Timeslots";
		$res_timeSlots = $this->query($sql, array());
		
		$formData = array("room_IDs" => $res_rooms, "time_slots" => $res_timeSlots);
		return $formData;
	}
	
	// Returns the resultset from the given query with the query vars
	private function query($queryStr, $queryVars) {
		$stmt = $this->conn->prepare($queryStr);
		
		$i = 1;
		foreach ($queryVars as $v) {
			$stmt->bindParam($i++, $v);
		}
		$stmt->setFetchMode(PDO::FETCH_NAMED);
		$stmt->execute($queryVars);
		
		return $stmt->fetchAll();
	}
	
	
	// returns True if $userID is in the Clients table of the database; false otherwise
	public function checkUserID($userID) {
		$sql = "SELECT UserID FROM Clients WHERE UserID == ?";
		$params = array($userID);
		$res_userID = $this->query($sql, $params);
		
		if (count($res_userID) < 1) { return false; } 
		else { return true; }
	}
	
	public function getRoomCapacity($roomID) {
		$sql = "SELECT Capacity FROM Rooms WHERE RoomID == ?";
		$params = array($roomID);
		$res_capacity = $this->query($sql, $params);
		
		return $res_capacity[0]["Capacity"];
	}
}
?>