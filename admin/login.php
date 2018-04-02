<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>HeadCountApp</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<h1>Admin Login</h1>
				<form action="home.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input type="text" id="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" name="password" class="form-control">
					</div>
					<input type="submit" value="Login" class="btn btn-primary" />
				</form>
				<br />
				<a href="../client">Volunteers Click Here</a>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>