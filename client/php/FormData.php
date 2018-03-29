<?php
/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Thomas Cox
 */

define("HC_BEG", "Beginning");
define("HC_MID", "Middle");
define("HC_END", "End");

class FormData {
	// Form Data
	private $roomIDs;	 											# String[]
	private $timeSlots; 											# String[]
	
	// DEPRECATED; use getHeadCountSlots() instead
	private $headCountSlots = array(HC_BEG, HC_MID, HC_END);	# Const String[]
	
	// Form Fields
	private $roomID; 												# String
	private $timeSlot;												# String
	private $headCount;												# int
	private $headCountSlot;											# String
	private $userID;													# String
	
	
	private $timeStamp;												# int
	
	public function __construct() {
	}
	
	public function __destruct() {
	}
	
	// Sets boundary-data attributes, such as the valid roomIDs and timeSlots
	public function setFormData($data) {
		$this->$roomIDs 	= $data["room_IDs"];
		$this->$timeSlots	= $data["time_slots"];
	}
	
	// Sets the values of the form-field attributes
	public function setFormFields($field_values) {
		$this->$roomID 			= $field_values["room_ID"];
		$this->$timeSlot		= $field_values["time_slot"]; 
		$this->$headCount 		= $field_values["head_count"];
		$this->$headCountSlot	= $field_values["head_count_slot"]; 
		$this->$userID			= $field_values["user_ID"];
		$this->$timeStamp		= $field_values["timestamp"];
	}
	
	// Sets an arbitrary attribute
	public function setFormAttr($name, $value) {
		switch ($name) {
			case "room_IDs":
				$this->$roomIDs = $value;
				break;
			case "time_slots":
				$this->$timeSlots = $value;
				break;
			case "room_ID":
				$this->$roomID = $value;
				break;
			case "time_slot":
				$this->$timeSlot = $value;
				break;
			case "head_count":
				$this->$headCount = $value;
				break;
			case "head_count_slot":
				$this->$headCountSlot = $value;
				break;
			case "user_ID":
				$this->$userID = $value;
				break;
			case "timestamp":
				$this->$timeStamp = $value;
				break;
			default:
				break;
		}
 	}
	
	// Returns boundary-data attributes, such as the valid roomIDs and timeSlots
	public function getFormData() {
		return array( "room_IDs" => $roomIDs, "time_slots" => $timeSlots );
	}
	
	// Returns the values of the form-field attributes
	public function getFormFields() {
		return array("room_ID" => $this->$roomID,
					 "time_slot" => $this->$timeSlot, 
					 "head_count" => $this->$headCount,
					 "head_count_slot" => $this->$headCountSlot, 
					 "user_ID" => $this->$userID,
					 "timestamp" => $this->$timestamp
					);
	}
	
	// Returns an arbitrary attribute
	public function getFormAttr($name) {
		switch ($name) {
			case "room_IDs":
				return $this->$roomIDs;
				break;
			case "time_slots":
				return $this->$timeSlots;
				break;
			case "room_ID":
				return $this->$roomID;
				break;
			case "time_slot":
				return $this->$timeSlot;
				break;
			case "head_count":
				return $this->$headCount;
				break;
			case "head_count_slot":
				return $this->$headCountSlot;
				break;
			case "user_ID":
				return $this->$userID;
				break;
			case "timestamp":
				return $this->$timeStamp;
				break;
			default:
				return NULL;
		}
	}
	
	public function getHeadCountSlots() {
		return array(HC_BEG, HC_MID, HC_END);
	}
	
	// Splits the current roomID into a name and number(if applicable)
	private function splitRoomID() {
		// Cases:
		// ROOM NAME | Rm# ROOM_NUM
		// ROOM NAME
		// Rm# ROOM_NUM
		
		return array($this->$roomID);
	}
	
	// Splits the current timeSlot into its components(date, hours, mins, secs, etc.)
	private function splitTimeSlot() {
		return array($this->$roomID);
	}
	
}
?>