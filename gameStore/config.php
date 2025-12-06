<?php
// Harden session cookie parameters for all back-end endpoints that include this file
$secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'] ?? '',
    'secure' => $secure,
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Use DATABASE_URL if it's set (e.g., on Render), otherwise local Docker
if (getenv('DATABASE_URL')) {
    $db_url = getenv('DATABASE_URL');
    $db_parts = parse_url($db_url);

    $host = $db_parts['host'];
    $user = $db_parts['user'];
    $pass = $db_parts['pass'];
    $dbname = ltrim($db_parts['path'], '/');
} else {
    // local Docker fallback
    $host = getenv('DB_HOST') ?: 'db';
    $user = getenv('DB_USER') ?: 'postgres';
    $pass = getenv('DB_PASSWORD') ?: 'postgres';
    $dbname = getenv('DB_NAME') ?: 'myshop';
}

// Connect to PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// CSRF Token helper functions
function get_csrf_token() {
    if(!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token ?? '');
}
?>
