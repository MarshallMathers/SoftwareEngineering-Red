<?php
include('session.php');
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

    <title>Title</title> <!-- change to what you want the tab's title to be -->

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark"><?php echo $login_session; ?></a> <!--this will be the name of the logged in admin -->
    </nav>
    <a class="btn btn-outline-primary" href="logout.php">Sign Out</a>
    <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
</div>

<!-- your code goes below -->


</body>
</html>