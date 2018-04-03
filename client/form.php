<?php	
	require("php/headCountApp.php");
	
	if ($ret === false) {
		//re-direct to index.php
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.php';
		$_SESSION["error"] = $msg;
		header("Location: http://$host$uri/$extra");
		exit;
	} else {
		/*if (!(isset($_COOKIE["user_ID"]))) {
			setcookie("user_ID", $msg, time()+60*60*24*3);
		}
		$userID = (strlen($_COOKIE["user_ID"]) > 0) ? $_COOKIE["user_ID"] : $msg;*/
		$_SESSION["user_ID"] = $_POST["user_ID"];
	}
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
	 * Contributors: Jacob Hayes, Zeily Perez
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
	<form action="submitForm.php" method="POST" class="container">
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
				    <input type="radio" name="head_count_slot" class="btn btn-primary" value="beg" required>Beginning</input>
				    <input type="radio" name="head_count_slot" class="btn btn-primary" value="mid" required>Middle</input>
				    <input type="radio" name="head_count_slot" class="btn btn-primary" value="end" required>End</input>
			</div>
		</div>

		<input type="number" name="head_count" value="0" min="0" required/>
		<input type="submit"/>
		<input type="reset"/>
		<input type="hidden" name="type" value="submit"/>
		<input type="hidden" name="user_ID" value="<?php echo $_COOKIE["user_ID"]; ?>"/>
		</form>
		
		<div id="ackContainer">	
			<?php echo $_SESSION["error"]; ?>
		</div>
	</div>
	
</body>

</html>