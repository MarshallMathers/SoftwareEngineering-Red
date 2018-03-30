<?php
/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Thomas Cox
 */

require ("FormData.php");
require ("DatabaseIO.php");

class HeadCountApp {
	private $database = NULL;												# DatabaseIO
	private $fd = NULL;													# FormData
	
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
		$timeStamp		= NULL; //$this->getTimeStamp(); // Use Database default
		
		// Validate and Sanitize
		
		
		$fields = array(
			"room_ID"			=> $roomID,
			"time_slot"			=> $timeSlot, 
			"head_count"		=> $headCount,
			"head_count_slot"	=> $headCountSlot, 
			"user_ID"			=> $userID,
			"timestamp"			=> $timeStamp
		);
		
		$this->fd->setFormFields($fields);
	}
	
	public function getFormData() {
		$data = $this->database->requestFormData();
		$this->fd->setFormData($data);
	}
	
	// Submits the form data in $data to the database
	public function submitHeadCountData() {
		//$data->setFormAttr("timestamp", getTimeStamp());
		$success = $this->database->submitHeadCountData($this->fd->getFormFields());
		submissionAcked($success);
	}
	
	// Called when the data submission is acknowedged. Displays in banner in the UI
	private function submissionAcked($success) {
		echo $success;
	}
	
	// Returns the current time as a timestamp
	private function getTimeStamp() {
		return mktime();
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
			echo "Successfully logged in as: ".$userID;
			return $userID;
		} else {
			echo "Unknown userID";
			return false;
		}
	} else if ($type === "submit") {
		$app->getFormData();
		$app->getFormFields();
		$app->submitHeadCountData();
		
		echo "Thank you for your Submission!";
		return true;
	} else if ($type === "data") {
		$app->getFormData();
		$data = $app->prepareFormData();
		echo json_encode($data);
		return true;
	}
}

$ret = main();
?>

