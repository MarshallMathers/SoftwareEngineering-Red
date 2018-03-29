<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'p4ssw0rd');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
try {
    $phpDataObject = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME,
        DB_USERNAME,
        DB_PASSWORD);
    // Set the PHP Data Object (PDO) error mode to exception
    $phpDataObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>