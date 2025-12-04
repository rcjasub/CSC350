<?php
$servername = getenv('MYSQL_HOST') ?: 'db';
$username   = getenv('MYSQL_USER') ?: 'root';
$password   = getenv('MYSQL_PASSWORD') ?: 'root';
$database   = getenv('MYSQL_DATABASE') ?: 'myshop';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
