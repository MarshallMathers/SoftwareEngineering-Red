<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (isset($_SESSION["userID"]) || !empty($_SESSION["userID"])) {
    header("location: index.php");
    exit;
}
require("php/headCountApp.php");
	
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($userID_err)) {
	$_SESSION["userID"] = $userID;
	header("location: index.php");
	exit;
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
	<!--
		Team: Red
		Group: Client
		Contributors: Jacob Hayes, Timothy Boss
	-->
</head>

<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<h2>Volunteer Portal Login</h2>
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<div class="form-group <?php echo (!empty($userID_err)) ? "has-error" : ""; ?>">
						<label for="user_ID">User ID:</label>
						<input type="text" class="form-control" name="user_ID" id="user_ID" required>
						<span class="help-block" style="color:red;">
							<?php echo $userID_err; ?>
						</span>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Sign In">
						<input type="hidden" name="type" value="login" />
					</div>
				</form>
				<h5>Not a Volunteer?</h5>
				<a class="btn btn-outline-primary" href="../admin/login.php">Administrator Sign In</a>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>