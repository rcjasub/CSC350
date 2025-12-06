<?php
// Email wrapper: tries SendGrid first, falls back to PHPMailer SMTP, then simple mail()

function send_email_smtp($to, $subject, $html_body, $from_name = null, $from_email = null) {
    // Prefer environment variables
    $from_email = $from_email ?? (getenv('EMAIL_FROM') ?: null);
    $from_name = $from_name ?? (getenv('EMAIL_FROM_NAME') ?: 'PlayDistrict');

    // Try SendGrid first if API key is available
    $sendgridKey = getenv('SENDGRID_API_KEY');
    if ($sendgridKey) {
        $autoload = __DIR__ . '/../vendor/autoload.php';
        if (file_exists($autoload)) {
            require_once $autoload;
            try {
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom($from_email, $from_name);
                $email->setSubject($subject);
                $email->addTo($to);
                $email->addContent("text/html", $html_body);
                
                $sendgrid = new \SendGrid($sendgridKey);
                $response = $sendgrid->send($email);
                
                if ($response->statusCode() >= 200 && $response->statusCode() < 300) {
                    return true;
                }
            } catch (Exception $e) {
                $logDir = __DIR__ . '/../logs';
                if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
                $logFile = $logDir . '/email.log';
                $msg = '['.date('c').'] SendGrid error: ' . $e->getMessage() . PHP_EOL;
                @file_put_contents($logFile, $msg, FILE_APPEND | LOCK_EX);
                // Fall through to PHPMailer
            }
        }
    }

    // Try to load PHPMailer via Composer
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (file_exists($autoload)) {
        require_once $autoload;
        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            // SMTP configuration from env
            $smtpHost = getenv('SMTP_HOST') ?: getenv('EMAIL_HOST');
            $smtpPort = getenv('SMTP_PORT') ?: 587;
            $smtpUser = getenv('SMTP_USER') ?: getenv('EMAIL_USER');
            $smtpPass = getenv('SMTP_PASS') ?: getenv('EMAIL_PASS');
            $smtpSecure = getenv('SMTP_SECURE') ?: 'tls'; // 'tls' or 'ssl'

            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUser;
            $mail->Password = $smtpPass;
            $mail->SMTPSecure = $smtpSecure === 'ssl' ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = intval($smtpPort);
            $mail->Timeout = 15; // 15 second timeout
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->SMTPKeepAlive = false; // Don't keep connection alive

            $mail->setFrom($from_email, $from_name);
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $html_body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            // Also append to a project log file for easier debugging inside the container
            $logDir = __DIR__ . '/../logs';
            if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
            $logFile = $logDir . '/email.log';
            $msg = '['.date('c').'] PHPMailer error: ' . $e->getMessage() . PHP_EOL;
            @file_put_contents($logFile, $msg, FILE_APPEND | LOCK_EX);
            error_log('PHPMailer error: ' . $e->getMessage());
            // fallthrough to fallback
        }
    }

    // Fallback to simple mail helper if PHPMailer not installed or failed
    $simple = __DIR__ . '/email.php';
    if (file_exists($simple)) {
        require_once $simple;
        $ok = send_email_simple($to, $subject, $html_body, $from_name, $from_email);
        if (!$ok) {
            $logDir = __DIR__ . '/../logs';
            if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
            $logFile = $logDir . '/email.log';
            $msg = '['.date('c').'] send_email_simple fallback failed (mail()).\n';
            @file_put_contents($logFile, $msg, FILE_APPEND | LOCK_EX);
        }
        return $ok;
    }

    return false;
}

?>
