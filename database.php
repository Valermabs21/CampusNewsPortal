<?php
// db_connection.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "campusportal_db";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
