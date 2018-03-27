/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Thomas Cox
 */

class FormData {
	// Form Data
	private var $roomIDs;	 											# String[]
	private var $timeSlots; 											# String[]
	
	// DEPRECATED; use getHeadCountSlots() instead
	private var $headCountSlots = array(HC_BEG, HC_MID, HC_END);		# Const String[]
	
	// Form Fields
	private var $roomID; 												# String
	private var $timeSlot;												# String
	private var $headCount;												# int
	private var $headCountSlot;											# String
	private var $userID													# String
	
	
	// Sets boundary-data attributes, such as the valid roomIDs and timeSlots
	public function setFormData($data) {
	
	}
	
	// Sets the values of the form-field attributes
	public function setFormFields($field_values) {
		$roomID 		= $field_values["room_ID"];
		$timeSlot		=	$field_values["time_slot"]; 
		$headCount 		= $field_values["head_count"];
		$headCountSlot	= $field_values["head_count_slot"]; 
		$userID			= $field_values["user_ID"];
	}
	
	// Sets an arbitrary attribute
	public function setFormAttr($name, $value) {
		switch ($name) {
			case "room_IDs":
				$roomIDs = $value;
				break;
			case "time_slots":
				$timeSlots = $value;
				break;
			case "room_ID":
				$roomID = $value;
				break;
			case "time_slot":
				$timeSlot = $value;
				break;
			case "head_count":
				$headCount = $value;
				break;
			case "head_count_slot":
				$headCountSlot = $value;
				break;
			case "user_ID":
				$userID = $value;
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
		return array("room_ID" => $roomID,
					 "time_slot" => $timeSlot, 
					 "head_count" => $headCount,
					 "head_count_slot" => $headCountSlot, 
					 "user_ID" => $userID
					);
	}
	
	// Returns an arbitrary attribute
	public function getFormAttr($name) {
		switch ($name) {
			case "room_IDs":
				return $roomIDs;
				break;
			case "time_slots":
				return $timeSlots;
				break;
			case "room_ID":
				return $roomID;
				break;
			case "time_slot":
				return $timeSlot;
				break;
			case "head_count":
				return $headCount;
				break;
			case "head_count_slot":
				return $headCountSlot;
				break;
			case "user_ID":
				return $userID;
				break;
			default:
				return NULL;
		}
	}
	
	public function getHeadCountSlots() {
		return array(HC_BEG, HC_MID, HC_END)
	}
	
	// Splits the current roomID into a name and number(if applicable)
	private function splitRoomID() {}
	
	// Splits the current timeSlot into its components(date, hours, mins, secs, etc.)
	private function splitTimeSlot() {}
	
}

class DatabaseIO {
	private var $db;													# Connection resource
	
	// Opens a connection to the database. Returns TRUE if successful, FALSE otherwise. 
	public function openConnection() {}
	
	// Closes the connection, if it is open
	public function closeConnection() {}
	
	// Submits the headcount data in the $data param of type FormData.
	public function submitHeadCountData($data) {}
	
	// Returns a FormData object with the form-data attributes set from the database
	public function requestFormData() {}
	
	// Returns the resultset from the given query with the query vars
	private function query($queryStr, $queryVars) {}
}

class HeadCountApp {
	private var $db														# DatabaseIO
	private var $data													# FormData
	
	// Retrieves form entries from $_POST and/or $_GET
	public function getFormData() {}
	
	// Submits the form data in $data to the database
	public function submitHeadCountData() {}
	
	// Called when the data submission is acknowedged. Displays in banner in the UI
	private function submissionAcked() {}
	
	// Returns the current time as a timestamp
	private function getTimeStamp() {}
}

////////////////////
// MAIN CODE HERE //
////////////////////
define("HC_BEG", "Beginning");
define("HC_MID", "Middle");
define("HC_END", "End");
