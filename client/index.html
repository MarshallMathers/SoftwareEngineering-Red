<?php
	// Initialize the session
	session_start();
	if (!isset($_SESSION["userID"]) || empty($_SESSION["userID"])) {
    	header("location: login.php");
  		exit;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require("php/headCountApp.php");
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>HeadCountApp</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="scripts/client.js"></script>
		<!-- change to what you want the tab's title to be -->
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
		<div>
			<div id="ackContainer">
				<?php echo $_SESSION["ack"]; ?>
			</div>
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="container">
				<div class="form-group">
					<label for="room_ID">Room ID:</label>
					<select id="room_ID" name="room_ID">
					</select>
				</div>

				<div class="form-group">
					<label for="time_slot">Time Slot:</label>
					<select id="time_slot" name="time_slot" required>
					</select>
				</div>

				<div class="form-group">
					<label for="head_count_slot">Head Count Slot:</label>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active">
							<input type="radio" name="options" id="option1" autocomplete="off" checked> Beginning
						</label>

						<label class="btn btn-secondary">
							<input type="radio" name="options" id="option2" autocomplete="off"> Middle
						</label>

						<label class="btn btn-secondary">
							<input type="radio" name="options" id="option3" autocomplete="off"> End
						</label>
					</div>
				</div>

				<input type="number" name="head_count" value="0" min="0" required/>
				<input type="submit" />
				<input type="reset" />
				<input type="hidden" name="type" value="submit" />
			</form>
		</div>
	</body>

	</html>