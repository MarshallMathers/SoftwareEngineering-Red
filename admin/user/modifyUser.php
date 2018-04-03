<?php
include '../../dbconfig.php';

$sql = "SELECT UserID FROM Clients";
$databaseQueryResult = mysqli_query($link, $sql);

if (!$databaseQueryResult) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>HeadCountApp</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <br/>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label>UserID</label>
                    <select id="userID_ID" name="userID_ID" class="form-control">
                        <?php
                        while ($row = mysqli_fetch_array($databaseQueryResult)) {
                            echo "<option value='" . $row['UserID'] . "'>" . $row['UserID'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>UserID</label>
                    <input type="text" id="userID" name="userID" class="form-control"/>
                </div>
                <input type="submit" value="Modify" class="btn btn-primary"/>
                <br/>
                <br/>
                <input type="reset" class="btn btn-default"/>
            </form>
            <br/>
            <a href="../index.php" class="btn btn-danger">Cancel</a>
            <br/>
            <br/>
            <a href="../logout.php" class="btn btn-secondary">Logout</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</body>

</html>