<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Get the session name before destroying
$sessionName = session_name();

// Destroy the session
session_destroy();

// Clear the session cookie - try multiple methods
if (ini_get('session.use_cookies')) {
	$params = session_get_cookie_params();
	setcookie($sessionName, '', time() - 42000, $params['path'], $params['domain'] ?? '', $params['secure'] ?? false, $params['httponly'] ?? false);
}

// Also clear with explicit parameters
setcookie($sessionName, '', array(
    'expires' => time() - 3600,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax'
));

// Return JSON response for AJAX requests
header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Logged out']);
exit;
?>
