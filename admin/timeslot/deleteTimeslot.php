<?php


// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION["username"]) || empty($_SESSION["username"])) {
    header("location: login.php");
    exit;
}

include '../../dbconfig.php';

$sql = "SELECT Room FROM rooms";
$result = mysqli_query($link,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $roomID = $_POST["room_ID"];
   $sql = "DELETE FROM rooms WHERE Room = '$roomID'";
   
   if (mysqli_query($link, $sql)){
       echo "<script type='text/javascript'>alert('$roomID successfully deleted.');</script>";
	   header("location: deleteRoom.php");
   }else{
       echo "<script type='text/javascript'>alert('Oops. Try Again Later.');</script>";
   }
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>HeadCountApp</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark">
                <?php echo htmlspecialchars($_SESSION["username"]); ?>
            </a>
        </nav>
        <a class="btn btn-outline-primary" href="../logout.php">Sign Out</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <br />
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label>Timeslot</label>
                        <select id="time_slot_ID" name="time_slot_ID" class="form-control">
						<?php
						while ($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['Timeslot'] . "'>" . $row['Timeslot'] . "</option>";
						}
						?>
						</select>
                    </div>
                    <input type="submit" value="Delete" class="btn btn-primary" />
                    <br />
                    <br />
                    <input type="reset" class="btn btn-default" />
                </form>
                <br />
                <a href="../index.php" class="btn btn-danger">Cancel</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>
