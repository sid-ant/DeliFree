<?php
//ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "delifree";

global $conn;
// Create connection

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($database) or die("Error");

?>
