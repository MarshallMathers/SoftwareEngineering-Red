<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>HeadCountApp</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.1/umd/popper.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <br/>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Users
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="user/viewUser.php">View Users</a>
                    <a class="dropdown-item" href="user/addUser.php">Add Users</a>
                    <a class="dropdown-item" href="user/modifyUser.php">Modify Users</a>
                    <a class="dropdown-item" href="user/deleteUser.php">Delete Users</a>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Rooms
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="room/viewRoom.php">View Rooms</a>
                    <a class="dropdown-item" href="room/addRoom.php">Add Rooms</a>
                    <a class="dropdown-item" href="room/modifyRoom.php">Modify Rooms</a>
                    <a class="dropdown-item" href="room/deleteRoom.php">Delete Rooms</a>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Timeslots
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="timeslot/viewTimeslot.php">View Timeslots</a>
                    <a class="dropdown-item" href="timeslot/addTimeslot.php">Add Timeslots</a>
                    <a class="dropdown-item" href="timeslot/modifyTimeslot.php">Modify Timeslots</a>
                    <a class="dropdown-item" href="timeslot/deleteTimeslot.php">Delete Timeslots</a>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Forms
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="form/addForm.php">Add Forms</a>
                    <a class="dropdown-item" href="form/modifyForm.php">Modify Forms</a>
                    <a class="dropdown-item" href="form/deleteForm.php">Delete Forms</a>
                </div>
            </div>
            <br/>
            <br/>
            <div>
                DISPLAY FORM DATA HERE USING PHP ECHO IN TABLE
            </div>
            <br/>
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</div>
</body>

</html>