<?php
session_start();
require __DIR__ . '/../config.php';
require __DIR__ . '/../utils/email.php';
require __DIR__ . '/../utils/mailer.php';
header('Content-Type: application/json');

// Only allow checkout for logged-in users
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Authentication required']);
    exit;
}

// Read JSON payload (cart data) if provided
$input = json_decode(file_get_contents('php://input'), true);
$cart = $input['cart'] ?? [];

// Calculate totals
$subtotal = 0.0;
foreach ($cart as $item) {
    $price = floatval($item['price'] ?? 0);
    $subtotal += $price;
}
$taxes = round($subtotal * 0.1, 2);
$total = round($subtotal + $taxes, 2);

// Fetch user info from DB
$user_id = $_SESSION['user_id'];
$user = null;
$res = pg_query_params($conn, 'SELECT username, email FROM users WHERE id=$1', [$user_id]);
if ($res) {
    $user = pg_fetch_assoc($res);
}

// Send order email to user if we have an email
if ($user && !empty($user['email'])) {
    // Debug: log SMTP env and vendor presence
    $logDir = __DIR__ . '/../logs';
    if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
    $logFile = $logDir . '/email.log';
    $vendor = __DIR__ . '/../vendor/autoload.php';
    $envInfo = '['.date('c').'] Email debug: SMTP_HOST=' . getenv('SMTP_HOST') . ', SMTP_PORT=' . getenv('SMTP_PORT') . ', SMTP_USER=' . (getenv('SMTP_USER') ? 'yes' : 'no') . ", vendor_exists=" . (file_exists($vendor) ? 'yes' : 'no') . PHP_EOL;
    @file_put_contents($logFile, $envInfo, FILE_APPEND | LOCK_EX);

    $to = $user['email'];
    $customerName = $user['username'] ?? 'Customer';
    $subject = "Order confirmation - PlayDistrict";

    // Build items list HTML
    $items_html = '<ul>';
    foreach ($cart as $item) {
        $title = htmlspecialchars($item['title'] ?? 'Item');
        $price = number_format(floatval($item['price'] ?? 0), 2);
        $items_html .= "<li>{$title} — $" . $price . "</li>";
    }
    $items_html .= '</ul>';

    $body = "<p>Hi " . htmlspecialchars($customerName) . ",</p>";
    $body .= "<p>Thank you for your purchase. You ordered the following items:</p>";
    $body .= $items_html;
    $body .= "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
    $body .= "<p><strong>Taxes:</strong> $" . number_format($taxes, 2) . "</p>";
    $body .= "<p><strong>Total:</strong> $" . number_format($total, 2) . "</p>";
    $body .= "<p>If you have any questions, reply to this email.</p>";

    // from values from env
    $from_email = getenv('EMAIL_FROM') ?: null;
    $from_name = getenv('EMAIL_FROM_NAME') ?: 'PlayDistrict';

    // Attempt to send email via PHPMailer (preferred) or fallback to mail()
    $email_ok = send_email_smtp($to, $subject, $body, $from_name, $from_email);
} else {
    $email_ok = false;
}

// TODO: persist order to database (orders + order_items). For now we return success and email status.

echo json_encode(['success' => true, 'message' => 'Order processed', 'items' => count($cart), 'email_sent' => $email_ok]);
exit;
?>
