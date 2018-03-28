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

    <title>Front Page</title> <!-- the tab's title-->

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark">Bob</a> <!--this will be the name of the logged in admin -->
    </nav>
    <a class="btn btn-outline-primary" href="logout.php">Sign Out</a> <!-- Sign out button -->
</div>

<div class="container">
    <div class="py-5 text-center">

        <h2>What would you like to do?</h2>
        <p class="lead">Click the buttons below to edit room requirements or to view submitted headcounts.</p>

        <a class="btn btn-outline-primary" href="edit_rooms.php">Edit Room Requirements</a>
        <!-- go to Edit Room Requirements page -->
        <br><br>
        <a class="btn btn-outline-primary" href="submitted-headcount.php">View Submitted Headcounts</a>
        <!-- go to View Submitted Headcounts page -->

    </div>
</div>
</body>
</html>