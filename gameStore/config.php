<?php
$db_url = getenv('DATABASE_URL') ?: 'postgresql://myshop_9syl_user:QgcOvYKTi7t6tYJYEBmI1Xuu4AWuRbXG@dpg-d4og6be3jp1c73dh028g-a/myshop_9syl';

if ($db_url) {
    $db_parts = parse_url($db_url);

    $host = $db_parts['host'];
    $user = $db_parts['user'];
    $pass = $db_parts['pass'];
    $dbname = ltrim($db_parts['path'], '/');
} else {
    // fallback for local Docker
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
