<?php
// For Render deployment
$db_url = getenv('DATABASE_URL');

if ($db_url) {
    $db_parts = parse_url($db_url);

    $host = $db_parts['host'];
    $user = $db_parts['user'];
    $pass = $db_parts['pass'];
    $dbname = ltrim($db_parts['path'], '/');
} else {
    // Local dev using .env
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
?>
