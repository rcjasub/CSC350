<?php
// Temporary test script to exercise email sending from the container.
require __DIR__ . '/../config.php';
require __DIR__ . '/../utils/mailer.php';
require __DIR__ . '/../utils/email.php';

// Find a user from the DB
$res = pg_query($conn, 'SELECT id, username, email FROM users LIMIT 1');
$user = pg_fetch_assoc($res);
if (!$user) {
    echo "No user found in DB to test email.\n";
    exit(1);
}

$to = $user['email'];
$subject = 'Test order email';
$body = '<p>Hi ' . htmlspecialchars($user['username']) . ',</p><p>This is a test order email.</p>';

// Log location
$logDir = __DIR__ . '/../logs';
if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
$logFile = $logDir . '/email.log';
@file_put_contents($logFile, '['.date('c').'] Running test-send.php\n', FILE_APPEND | LOCK_EX);

$ok = send_email_smtp($to, $subject, $body, 'Game Store', getenv('EMAIL_FROM'));
@file_put_contents($logFile, '['.date('c').'] send_email_smtp returned: ' . ($ok ? 'true' : 'false') . "\n", FILE_APPEND | LOCK_EX);

echo 'send_email_smtp returned: ' . ($ok ? 'true' : 'false') . "\n";
?>
