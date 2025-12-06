<?php
// Debug script to check environment variables on Render
header('Content-Type: text/plain');

echo "=== Environment Variables Debug ===\n\n";

$env_vars = [
    'SMTP_HOST',
    'SMTP_PORT',
    'SMTP_USER',
    'SMTP_PASS',
    'SMTP_SECURE',
    'EMAIL_FROM',
    'EMAIL_FROM_NAME',
    'DATABASE_URL'
];

foreach ($env_vars as $var) {
    $value = getenv($var);
    if ($value) {
        // Hide password partially for security
        if ($var === 'SMTP_PASS') {
            echo "$var = " . substr($value, 0, 4) . "****\n";
        } elseif ($var === 'DATABASE_URL') {
            echo "$var = (set, length: " . strlen($value) . ")\n";
        } else {
            echo "$var = $value\n";
        }
    } else {
        echo "$var = NOT SET\n";
    }
}

echo "\n=== Vendor autoload exists? ===\n";
$vendor = __DIR__ . '/vendor/autoload.php';
echo file_exists($vendor) ? "YES: $vendor\n" : "NO: $vendor not found\n";

echo "\n=== PHPMailer available? ===\n";
if (file_exists($vendor)) {
    require_once $vendor;
    echo class_exists('PHPMailer\\PHPMailer\\PHPMailer') ? "YES\n" : "NO\n";
} else {
    echo "Cannot check - vendor/autoload.php missing\n";
}

echo "\n=== Delete this file after checking! ===\n";
?>
