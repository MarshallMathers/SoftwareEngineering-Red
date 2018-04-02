<?php
include '../../dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $room = $_POST["room_name"];
   $capacity = $_POST["capacity"];
   $sql = "INSERT INTO Rooms (Room, Capacity) VALUES ('$room', '$capacity')";
   if (mysqli_query($link, $sql)){
       echo "<script type='text/javascript'>alert('$room successfully added with a capacity of $capacity.');</script>";
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
                        <label>Room Name</label>
                        <input type="text" id="room_name" name="room_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" id="capacity" name="capacity" min="0" class="form-control" />
                    </div>
                    <input type="submit" name="submit" value="Add" class="btn btn-primary" />
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
