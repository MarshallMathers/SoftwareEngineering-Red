<?php
	// Start the session
	session_start();
	
	setCookie("user_ID", "", time() - 60*60);
	setCookie("error", "", time() - 60*60);
?>
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
	<script>
		/* Team: Red
		 * Group: Client
		 * Contributors: Jacob Hayes, Timothy Boss
		 */
	</script>
	
	<title>Client Login</title>
</head>

<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark">Sign In</a> <!--this will be the name of the logged in admin -->
      </nav>
      <a class="btn btn-outline-primary" href="index.php">Sign Out</a> <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
    </div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="form.php" method="post" class="text-center">
					<div class="form-group">
						<label>UserID</label>
						<input type="text" name="user_ID" class="form-control"/>
					</div>
					<input type="submit" value="Submit" class="btn btn-primary"/>
					<input type="hidden" value="login" name="type"/>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>