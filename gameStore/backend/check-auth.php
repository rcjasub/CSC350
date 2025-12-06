<?php
session_start();
header('Content-Type: application/json');

// Check if user is logged in (no DB needed - just checking session)
$is_logged_in = isset($_SESSION['user_id']);

echo json_encode([
    'logged_in' => $is_logged_in,
    'user_id' => $is_logged_in ? $_SESSION['user_id'] : null
]);
exit;
?>
