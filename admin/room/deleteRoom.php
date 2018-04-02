<?php


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
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <br />
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label>Room ID</label>
                        <select id="room_ID" name="room_ID" class="form-control">
						<?php
						while ($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['Room'] . "'>" . $row['Room'] . "</option>";
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
                <br />
                <br />
                <a href="../logout.php" class="btn btn-secondary">Logout</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>
