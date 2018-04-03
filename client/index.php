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

$sqlRoom = "SELECT Room FROM rooms";
$resultRoom = mysqli_query($link, $sqlRoom);

$sqlTimeslot = "SELECT Timeslot FROM timeslots";
$resultTimeslot = mysqli_query($link, $sqlTimeslot);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
		<!-- your code goes below -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4 text-center">
					<form action="<?php echo $_SERVER[" PHP_SELF "]; ?>" method="post">
						<div class="form-group">
							<label for="room_name">Room</label>
							<select id="room_name" name="room_name" class="form-control">
							<?php
							while ($row = mysqli_fetch_array($resultRoom)) {
								echo "<option value='" . $row['Room'] . "'>" . $row['Room'] . "</option>";
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<label for="time_slot">Timeslot</label>
							<select id="time_slot" name="time_slot" class="form-control">
							<?php
							while ($row = mysqli_fetch_array($resultTimeslot)) {
								echo "<option value='" . $row['Timeslot'] . "'>" . $row['Timeslot'] . "</option>";
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<label for="head_count_type">Headcount Type</label>
							<div class="radio-inline">
								<input type="radio" name="options" id="option1" value="Beginning"> Beginning
								<input type="radio" name="options" id="option2" value="Middle"> Middle
								<input type="radio" name="options" id="option3" value="End"> End
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="head_count" value="0" min="0" pattern="[0-9]" class="form-control" />
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