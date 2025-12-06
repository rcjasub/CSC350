<?php
/**
 * One-time database setup script for Render deployment
 * Run this once to initialize your database tables
 * Visit: https://your-app.onrender.com/db-setup-render.php
 * Then DELETE this file for security!
 */

// Use DATABASE_URL from environment, or fallback to hardcoded value
$db_url = getenv('DATABASE_URL') ?: "postgresql://myshop_9syl_user:QgcOvYKTi7t6tYJYEBmI1Xuu4AWuRbXG@dpg-d4og6be3jp1c73dh028g-a/myshop_9syl";
$db_parts = parse_url($db_url);

$host = $db_parts['host'];
$user = $db_parts['user'];
$pass = $db_parts['pass'];
$dbname = ltrim($db_parts['path'], '/');

echo "Connecting to database...\n";
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error() . "\n");
}

echo "Connected successfully!\n\n";

// Read and execute SQL files in order
$sql_files = [
    __DIR__ . '/db-init/01-users.sql',
    __DIR__ . '/db-init/02-orders.sql',
    __DIR__ . '/db-init/03-orders_items.sql'
];

foreach ($sql_files as $file) {
    echo "Executing: " . basename($file) . "\n";
    $sql = file_get_contents($file);
    
    $result = pg_query($conn, $sql);
    
    if ($result) {
        echo "✓ " . basename($file) . " executed successfully\n";
    } else {
        echo "✗ Error in " . basename($file) . ": " . pg_last_error($conn) . "\n";
    }
    echo "\n";
}

echo "Database setup complete!\n";
echo "You can now delete this file (db-setup-render.php) for security.\n";

pg_close($conn);
?>
