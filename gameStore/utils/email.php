<?php
// Lightweight email helper using PHP mail().
// This is a simple abstraction; on production use a proper SMTP library (PHPMailer).

function send_email_simple($to, $subject, $html_body, $from_name = null, $from_email = null) {
    // Default from values from environment or config
    $from_email = $from_email ?? ($_ENV['EMAIL_FROM'] ?? null);
    $from_name = $from_name ?? ($_ENV['EMAIL_FROM_NAME'] ?? 'PlayDistrict');

    $headers = [];
    if ($from_email) {
        $headers[] = 'From: ' . ($from_name ? "$from_name <$from_email>" : $from_email);
    }
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=UTF-8';

    // Flatten headers
    $headers_str = implode("\r\n", $headers);

    // Use mail() as a fallback. Return boolean success state.
    try {
        $ok = mail($to, $subject, $html_body, $headers_str);
        return $ok;
    } catch (Exception $e) {
        error_log('Email send error: ' . $e->getMessage());
        return false;
    }
}

?>
