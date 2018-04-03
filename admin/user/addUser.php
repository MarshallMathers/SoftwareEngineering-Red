<?php
include '../../dbconfig.php';

$selectUsersSqlStatement = "SELECT UserID FROM Clients";
$result = mysqli_query($link, $selectUsersSqlStatement);
$currentUsers = array();

while ($row = mysqli_fetch_array($result)) {
    $currentUsers[] = $row['UserID'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["userID"];
    for ($i = 0; $i < count($currentUsers); $i++) {
        if ($currentUsers[$i] === $userID) {
            echo "<script type='text/javascript'>alert('$userID is a name already in the database.');window.location.href='addUser.php';</script>";
            return false;
        }
    }
    $insertUserSqlStatement = "INSERT INTO Clients (UserID) VALUE ('$userID')";
    if (mysqli_query($link, $insertUserSqlStatement)) {
        echo "<script type='text/javascript'>alert('$userID successfully added.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Oops. Try Again Later.');</script>";
    }
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
                    <input type="text" id="userID" name="userID" class="form-control"/>
                </div>
                <input type="submit" value="Add" class="btn btn-primary"/>
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