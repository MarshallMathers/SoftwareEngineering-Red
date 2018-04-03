<?php
include '../../dbconfig.php';

$sql = "SELECT * FROM Clients";
$databaseQueryResult = mysqli_query($link,$sql);
if (!$databaseQueryResult) {
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
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_array($databaseQueryResult)) {
                            echo "<tr><td>".$row['UserID']."</td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <br />
                <a href="../index.php" class="btn btn-danger">Cancel</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>