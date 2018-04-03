<?php
/* Database credentials. */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'p4ssw0rd');
define('DB_NAME', 'headCountApp');

/* Attempt to connect to MySQL database */
try {
    $databaseConnection = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME,
        DB_USERNAME,
        DB_PASSWORD);
    // Set the PHP Data Object (PDO) error mode to exception
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $databaseConnectionException) {
    die("Database Connection failed: " . $databaseConnectionException->getMessage());
}
?>