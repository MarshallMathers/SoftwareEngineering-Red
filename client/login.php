<?php
	// Processing form data when form is submitted
	session_start();
	
	$userID = "";
	$userID_err = "";
	
	require("php/headCountApp.php");
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($userID_err)) {
		$_SESSION["user_ID"] = $userID;
		header("location: index.php");
		exit;
	}
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
    </div>
    <div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<h2>Login to submit Headcounts</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="form-group <?php echo (!empty($userID_err)) ? 'has-error' : ''; ?>">
						<label for="user_ID">User ID:</label>
						<input type="text" class="form-control" name="user_ID" id="user_ID" required>
						<span class="help-block" style="color:red;">
							<?php echo $userID_err; ?>
						</span>
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Sign In">
						<input type="hidden" name="type" value="login"/>
					</div>
				</form>
				<h5> Not an Volunteer? Sign in to the Administrator Portal:</h5>
				<a class="btn btn-outline-primary" href="../admin/index.php">Administrator Sign In</a>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>