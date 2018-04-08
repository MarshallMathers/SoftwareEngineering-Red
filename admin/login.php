<?php
/*
 * Login and session management code based off of following guide:
 *  https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
 */

// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (isset($_SESSION["username"]) || !empty($_SESSION["username"])) {
    header("location: index.php");
    exit;
}
// Include config file
include "../dbconfig.php";

// Define variables and initialize with empty values
$username = "";
$password = "";
$usernameErrorMessage = "";
$passwordErrorMessage = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $usernameErrorMessage = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $passwordErrorMessage = "Please enter password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($usernameErrorMessage) && empty($passwordErrorMessage)) {
        // Prepare a select statement
        $sqlQueryForAdminUsers = "SELECT username, password FROM Admins WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sqlQueryForAdminUsers)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashedPassword);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashedPassword)) {
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION["username"] = $username;
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $passwordErrorMessage = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $usernameErrorMessage = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <h2>Administrator Portal Login</h2>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div class="form-group <?php echo (!empty($usernameErrorMessage)) ? "has-error" : ""; ?>">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" maxlength="20" class="form-control" />
                            <span class="help-block" style="color:red;">
                                <?php echo $usernameErrorMessage; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($passwordErrorMessage)) ? "has-error" : ""; ?>">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="help-block" style="color:red;">
                                <?php echo $passwordErrorMessage; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Sign In">
                        </div>
                    </form>
                    <h5>Not an Administrator?</h5>
                    <a class="btn btn-outline-primary" href="../client/login.php">Volunteer Sign In</a>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>

    </html>