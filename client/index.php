<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION["userID"]) || empty($_SESSION["userID"])) {
	header("location: login.php");
	exit;
}
// Include config file
include "../dbconfig.php";

// Define variables and initialize with empty values
$roomID = "";
$timeslotID = "";
$headCountType = "";
$headCount = "";
$roomID_err = "";
$timeslotID_err = "";
$headCountType_err = "";
$headCount_err = "";

$sqlRoom = "SELECT RoomID, Room FROM Rooms";
$resultRoom = mysqli_query($link, $sqlRoom);

$sqlTimeslot = "SELECT TimeslotID, Timeslot FROM Timeslots";
$resultTimeslot = mysqli_query($link, $sqlTimeslot);

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if RoomID is empty
    if (empty(trim($_POST["RoomID"]))) {
        $roomID_err = "Please select Room.";
    } else {
        $roomID = trim($_POST["RoomID"]);
	}
	
	// Check if TimeslotID is empty
    if (empty(trim($_POST["TimeslotID"]))) {
        $timeslotID_err = "Please select Timeslot.";
    } else {
        $timeslotID = trim($_POST["TimeslotID"]);
	}
	
	// Check if HeadCountType is empty
    if (empty(trim($_POST["HeadCountType"]))) {
        $headCountType_err = "Please select Headcount Type.";
    } else {
        $headCountType = trim($_POST["HeadCountType"]);
	}
	
	// Check if HeadCount is empty
    if (empty(trim($_POST["HeadCount"]))) {
        $headCount_err = "Please enter Headcount.";
    } else {
        $headCount = trim($_POST["HeadCount"]);
    }

    // Validate credentials
    if (empty($roomID_err) && empty($timeslotID_err) && empty($headCountType_err) && empty($headCount_err)) {
		// Check for duplicates
		$sqlDuplicate = "SELECT * FROM Forms WHERE RoomID = '$roomID' AND TimeslotID = '$timeslotID' AND HeadcountType = '$headCountType'";
		$resultDuplicate = mysqli_query($link, $sqlDuplicate);
		if (mysqli_num_rows($resultDuplicate) != 0){
			if(echo "<script>confirm('This form already exists. Are you sure you want to override it?')</script>")
			{
				// Prepare a select statement
				$sql = "INSERT INTO Forms (RoomID, TimeslotID, HeadcountType, HeadcountCount, UserID) VALUES (?, ?, ?, ?, ?)";

				if ($stmt = mysqli_prepare($link, $sql)) {
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmt, "sssss", $param_roomID, $param_timeslotID, $param_headCountType, $param_headCount, $param_userID);
					
					// Set parameters
					$param_roomID = $roomID;
					$param_timeslotID = $timeslotID;
					$param_headCountType = $headCountType;
					$param_headCount = $headCount;
					$param_userID = $_SESSION["userID"];
		
					// Attempt to execute the prepared statement
					if (mysqli_stmt_execute($stmt)) {
						echo "<script>alert('Form successfully submitted!');window.location = 'index.php';</script>";
					} else {
						echo "<script>alert('Oops! Something went wrong. Please try again later.');window.location = 'index.php';</script>";
					}
				}
		
				// Close statement
				mysqli_stmt_close($stmt);
			}else{
				echo "<script>window.location = 'index.php';}</script>";
		}
    }

    // Close connection
    mysqli_close($link);
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>HeadCountApp</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!--
   		/* Team: Red
	 	* Group: Client
	 	* Contributors: Jacob Hayes, Zeily Perez, Ian Marshall
	 	*/
		-->
	</head>

	<body>
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
			<h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
			<nav class="my-2 my-md-0 mr-md-3">
				<a class="p-2 text-dark">
					<?php echo htmlspecialchars($_SESSION["userID"]); ?>
				</a>
			</nav>
			<a class="btn btn-outline-primary" href="logout.php">Sign Out</a>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4 text-center">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<div class="form-group <?php echo (!empty($roomID_err)) ? "has-error" : ""; ?>">
							<label for="RoomID">Room</label>
							<select id="RoomID" name="RoomID" class="form-control">
							<?php
							while ($row = mysqli_fetch_array($resultRoom)) {
								echo "<option value='" . $row['RoomID'] . "'>" . $row['Room'] . "</option>";
							}
							?>
							</select>
							<span class="help-block" style="color:red;">
								<?php echo $roomID_err; ?>
							</span>
						</div>
						<div class="form-group <?php echo (!empty($timeslotID_err)) ? "has-error" : ""; ?>">
							<label for="TimeslotID">Timeslot</label>
							<select id="TimeslotID" name="TimeslotID" class="form-control">
							<?php
							while ($row = mysqli_fetch_array($resultTimeslot)) {
								echo "<option value='" . $row['TimeslotID'] . "'>" . $row['Timeslot'] . "</option>";
							}
							?>
							</select>
							<span class="help-block" style="color:red;">
								<?php echo $timeslotID_err; ?>
							</span>
						</div>
						<div class="form-group <?php echo (!empty($headCountType_err)) ? "has-error" : ""; ?>">
							<label for="HeadCountType">Headcount Type</label>
							<div class="radio-inline">
								<input type="radio" name="HeadCountType" id="HeadCountType" value="Beginning"> Beginning
								<input type="radio" name="HeadCountType" id="HeadCountType" value="Middle"> Middle
								<input type="radio" name="HeadCountType" id="HeadCountType" value="End"> End
							</div>
							<span class="help-block" style="color:red;">
								<?php echo $headCountType_err; ?>
							</span>
						</div>
						<div class="form-group <?php echo (!empty($headCount_err)) ? "has-error" : ""; ?>">
							<label for="HeadCount">Headcount</label>
							<input type="number" name="HeadCount" value="0" min="0" pattern="[0-9]" class="form-control" />
							<span class="help-block" style="color:red;">
								<?php echo $headCount_err; ?>
							</span>
						</div>
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" />
					</form>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>

	</html>