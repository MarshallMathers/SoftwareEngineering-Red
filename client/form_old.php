<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    	
	<!-- jQuery JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="scripts/client.js"></script>
	<script>
		/* Team: Red
		 * Group: Client
		 * Contributors: Jacob Hayes, Thomas Cox, Zeily Perez
		 */
	</script>
    
    <title>Client Login</title>
</head>

<body>
	<div id="ackContainer">	
		<?php
			require("php/headCountApp.php");
			
			$userID = NULL;
			
			if ($ret === false) {
				//re-direct to index.php
				echo "<div id=\"redirect\" name=\"index.php\"></div>";
			} else {
				$userID = $ret;
				$_POST["user_ID"] = $userID;
			}
		?>
	</div>
	
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark"><?php echo $userID ?></a> <!--this will be the name of the logged in admin -->
      </nav>
      <a class="btn btn-outline-primary" href="index.php">Sign Out</a> <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
    </div>
	
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="submitForm.php" method="post" class="text-center">
                    <div class="form-group">
                        <label>Room</label>
                        <select id="room_ID" name="room_ID" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Timeslot</label>
                        <select id="time_slot" name="time_slot" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Headcount Type</label>
                        <select id="head_count_slot" name="head_count_slot" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Headcount</label>
                        <input type="number" name="head_count" value="0" min="0" class="form-control" />
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary" />
                    <br />
                    <br />
                    <input type="reset" class="btn btn-default" />
                    <input type="hidden" name="type" value="submit" />
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>