<?php
include '../../dbconfig.php';

$sql = "SELECT * FROM rooms";
$result = mysqli_query($link,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
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
                <div>
					<table border="1" style="width:100% border-width:1px">
						<tr>
							<th>Room ID</th>
							<th>Room Name</th> 
							<th>Capacity</th>
						</tr>
						<?php
							while ($row = mysqli_fetch_array($result)) {
								echo "<tr><td>".$row['RoomID']."</td><td>".$row['Room']."</td><td>".$row['Capacity']."</td></tr>";	
							}
						?>
					</table>
                </div>
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
