<?php
include '../../dbconfig.php';

$sql1 = "SELECT Timeslot FROM timeslots";
$result = mysqli_query($link,$sql1);
$currentTimes = array();

while ($row = mysqli_fetch_array($result)) {
	$currentTimes[]=$row['Timeslot'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $Timeslot = $_POST["time_slot"];
   for ($i=0;$i<count($currentTimes);$i++){
		if ($currentTimes[$i] === $Timeslot){
			echo "<script type='text/javascript'>alert('$Timeslot is a time already in the database.');window.location.href='addTimeslot.php';</script>";
			return false;
		}
	}
   $sql2 = "INSERT INTO timeslots (Timeslot) VALUES ('$Timeslot')";
   if (mysqli_query($link, $sql2)){
       echo "<script type='text/javascript'>alert('$Timeslot successfully added.');</script>";
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
                        <label>Timeslot</label>
                        <input type="text" id="time_slot" name="time_slot" class="form-control" />
                    </div>
                    <input type="submit" value="Add" class="btn btn-primary" />
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
