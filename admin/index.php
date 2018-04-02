<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
require_once("config_headcnt.php");

try {
    $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;
    $pdo = null;
} catch (PDOException $e) {
    print "ERROR!: " . $e->getMessage() . "<br/>";
    die();
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

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
        <!--this will be the name of the logged in admin -->
    </nav>
    <a class="btn btn-outline-primary" href="logout.php">Sign Out</a> <!-- Sign out button -->
</div>

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
            <div class="container">
                <CENTER>
                    <h2>Room Count View</h2></CENTER>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <?php
                    $pdo = new PDO($connString, $user, $pass);

                    $sql = "SELECT * FROM Forms";

                    $result = $pdo->query($sql);

                    echo
                        "<th>FormID</th>" .
                        "<th>RoomID</th>" .
                        "<th>TimeslotID</th>" .
                        "<th>Headcount Count</th>" .
                        "<th>UserID</th>" .
                        "<th>HeadcountType</th>" .
                        "<th>Timestamp</th>" .
                        "</thead>";

                    while ($row = $result->fetch()) {
                        // FormID, RoomID, HeadcountCount, USERID, HeadcountType, timestamp
                        $formid = $row['FormID'];
                        $roomid = $row['RoomID'];
                        $timeslotid = $row['TimeslotID'];
                        $headcount = $row['HeadcountCount'];
                        $userid = $row['UserID'];
                        $headcounttype = $row['HeadcountType'];
                        $tstamp = $row['Timestamp'];

                        echo "<tr>" .
                            "<td>" . $formid . "</td>" . // FormID
                            "<td>" . $roomid . "</td>" . // RoomID
                            "<td>" . $timeslotid . "</td>" . // TimeslotID
                            "<td>" . $headcount . "</td>" . // HeadcountCount
                            "<td>" . $userid . "</td>" . // UserID
                            "<td>" . $headcounttype . "</td>" . // Headcountype
                            "<td>" . $tstamp . "</td>" . // Timestamp
                            "</tr>";
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>