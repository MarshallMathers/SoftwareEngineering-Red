<?php
include('login.php'); // Includes Login Script

if (isset($_SESSION['login_user'])) {
    header("location: profile.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin Login Portal</title> <!-- change to what you want the tab's title to be -->

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
</div>

<div class="container">
    <div class="py-5 text-center">
        <h2>Login - Administrator Portal</h2>
        <form action="" method="post">
            <label for="usr">Name:</label>
            <center>
                <input type="text" class="form-control" id="usr" name="username" style="width: 400px;">
            </center>
            <br>
            <label for="pwd">Password:</label>
            <center>
                <input type="password" class="form-control" id="pwd" name="password" style="width: 400px;">
            </center>
            <br>
            <input class="btn btn-outline-primary" name="submit" type="submit" value="Sign In">
            <br>
            <span><?php echo $error; ?></span>
        </form>

        <br/><br/>
        <a class="btn btn-outline-primary" href="#">Forgot Password?</a>
        <br><br><br><br>
        <h5> Not an administrator? Sign in to the Volunteer Portal:</h5>
        <a class="btn btn-outline-primary" href="#">Volunteer Sign In</a>
    </div>
</div>
</body>
</html>
