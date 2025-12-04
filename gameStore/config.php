<?php
$servername = "db"; // Docker service name
$username = "root";
$password = "root";
$database = "myshop";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
