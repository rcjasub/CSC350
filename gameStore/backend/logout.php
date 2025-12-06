<?php
session_start();
// Clear session data
$_SESSION = [];
if (ini_get('session.use_cookies')) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'] ?? '', $params['secure'] ?? false, $params['httponly'] ?? false);
}
session_destroy();
// Clear the session ID from browser immediately
setcookie(session_name(), '', array(
    'expires' => time() - 3600,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax'
));
header('Location: ../index.php');
exit;
?>
