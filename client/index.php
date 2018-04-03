<?php
	// Initialize the session
	session_start();
	if (!isset($_SESSION["user_ID"]) || empty($_SESSION["user_ID")) {
    	header("location: login.php");
  		exit;
	}
	
	require_once("php/headCountApp.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- jQuery JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="scripts/client.js"></script>
	
    <title>Headcount Submission</title> <!-- change to what you want the tab's title to be -->
    <!--
    /* Team: Red
	 * Group: Client
	 * Contributors: Jacob Hayes, Zeily Perez, Ian Marshall
	 */
	-->
	
</head>
<body>
	<h1 style="background-color:lightgreen;">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    	<h5 class="my-0 mr-md-auto font-weight-normal," background-color:DodgerBlue;> Boston Code Camp </h5> 
    	<nav class="my-2 my-md-0 mr-md-3">
        	<a class="p-10 color: blue"><?php echo $_SESSION["user_ID"]; ?></a> 
        	<p style="color:Blue;"> </p> 
          <!--this will be the name of the logged in admin -->
        </nav>
        <a class="btn btn-outline-primary" href="index.php">Sign Out</a> <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
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
				<div class="btn-group btn-group">
					<input type="radio" name="head_count_slot" class="btn btn-radio" value="beg" required>Beginning</input>
					<input type="radio" name="head_count_slot" class="btn btn-radio" value="mid" required>Middle</input>
					<input type="radio" name="head_count_slot" class="btn btn-radio" value="end" required>End</input>
				</div>
			</div>

			<input type="number" name="head_count" value="0" min="0" required/>
			<input type="submit"/>
			<input type="reset"/>
			<input type="hidden" name="type" value="submit"/>
		</form>
	</div>
</body>

</html>