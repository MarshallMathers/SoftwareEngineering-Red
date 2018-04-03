<?php
// Include config file
include "dbconfig.php";

// Define variables and initialize with empty values
$username = "";
$password = "";
$username_err = "";
$password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = 'Please enter username.';
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter password.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT username, password FROM Admins WHERE username = :username";

        if ($stmt = $databaseConnection->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if username exists, if yes then verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $hashed_password = $row['password'];
                        if (password_verify($password, $hashed_password)) {
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($databaseConnection);
}
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
        </div>

        <div class="container">
            <div class="py-5 text-center">
                <h2>Administrator Portal</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label for="usr">Username:</label>
                        <input type="text" class="form-control" name="username" id="usr" style="width: 400px;">
                        <span class="help-block" style="color:red;">
                            <?php echo $username_err; ?>
                        </span>
                    </div>
                    <br>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password" id="pwd" style="width: 400px;">
                        <span class="help-block" style="color:red;">
                            <?php echo $password_err; ?>
                        </span>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sign In">
                    </div>
                    <br/>
                    <br/>
                </form>

                <br>
                <br>
                <h5> Not an Administrator? Sign in to the Volunteer Portal:</h5>
                <a class="btn btn-outline-primary" href="../client/index.php">Volunteer Sign In</a>
            </div>
        </div>
    </body>

    </html>