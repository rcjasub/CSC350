<?php
session_start();
require __DIR__ . '/../config.php';
header('Content-Type: application/json');

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);

echo json_encode([
    'logged_in' => $is_logged_in,
    'user_id' => $is_logged_in ? $_SESSION['user_id'] : null
]);
exit;
?>
