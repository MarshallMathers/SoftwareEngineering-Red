<?php
/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Thomas Cox
 */

require ("FormData.php");
require ("DatabaseIO.php");

class HeadCountApp {
	private $database;												# DatabaseIO
	private $fd;													# FormData
	
	public function __construct() {
		$this->fd = new FormData();
		$this->database = new DatabaseIO();
		
		$this->database->openConnection();
	}
	
	public function __destruct() {
		$this->database->closeConnection();
	}
	
	// Retrieves form entries from $_POST
	public function getFormFields() {
		$roomID			= $_POST["room_ID"];
		$timeSlot		= $_POST["time_slot"];
		$headCount		= $_POST["head_count"];
		$headCountSlot	= $_POST["head_count_slot"];
		$userID 		= $_POST["user_ID"];
		$timeStamp		= $this->getTimeStamp(); // Do not Use Database default
		
		// Validate and Sanitize
		$capacity = $this->database->getRoomCapacity($roomID);
		$capacity += $capacity *  0.1;
		if ($headCount < 0 || $headCount > $capacity) {
			return false;
		}
		
		$fields = array(
			"room_ID"			=> $roomID,
			"time_slot"			=> $timeSlot, 
			"head_count"		=> $headCount,
			"head_count_slot"	=> $headCountSlot, 
			"user_ID"			=> $userID,
			"time_stamp"		=> $timeStamp,
		);
		
		$this->fd->setFormFields($fields);
		return true;
	}
	
	public function getFormData() {
		$data = $this->database->requestFormData();
		$this->fd->setFormData($data);
	}
	
	// Submits the form data in $data to the database
	public function submitHeadCountData() {
		$success = $this->database->submitHeadCountData($this->fd->getFormFields());
		return $this->submissionAcked($success);
	}
	
	// Called when the data submission is acknowedged. Displays in banner in the UI
	private function submissionAcked($success) {
		return $success;
	}
	
	// Returns the current time as a timestamp
	private function getTimeStamp() {
		return date("Y-m-d H:i:s", mktime());
	}
	
	
	public function login($uID) {
		return $this->database->checkUserID($uID);
	}
	
	public function prepareFormData() {
		return $this->fd->getFormData();
	}
}

////////////////////
// MAIN CODE HERE //
////////////////////
function main() {
	$app = new HeadCountApp();
	
	$type = $_POST["type"];
	if ($type === "login") {
		$userID = $_POST["user_ID"];
		$valid = $app->login($userID);
		if ($valid) {
			return $userID;
		} else {
			return false;
		}
	} else if ($type === "submit") {
		$app->getFormData();
		$valid = $app->getFormFields();
		if ($valid) {
			$success = $app->submitHeadCountData();
			if ($success) {
				return "Thank you for your Submission!";
			} else {
				return false;
			}
		} else {
			return false;
		}
	} else if ($type === "data") {
		$app->getFormData();
		$data = $app->prepareFormData();
		echo json_encode($data);
		return true;
	}
}

$ret = main();
?>

