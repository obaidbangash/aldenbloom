<?php
header('Content-Type: application/json; charset=UTF-8');

use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
    exit;
}

$autoload = __DIR__ . '/vendor/autoload.php';
if (!is_readable($autoload)) {
    error_log('send_email.php: vendor/autoload.php missing — run composer install on the server or deploy the vendor folder.');
    echo json_encode([
        'status' => 'error',
        'message' => 'Mail is not available on the server. Please contact the site owner.',
    ]);
    exit;
}

require $autoload;

$configPath = __DIR__ . '/email_config.php';
if (!is_readable($configPath)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Contact form is not configured. The site needs email_config.php (see email_config.example.php).',
    ]);
    exit;
}

$config = require $configPath;
if (!is_array($config)) {
    error_log('send_email.php: email_config.php must return an array.');
    echo json_encode(['status' => 'error', 'message' => 'Invalid email configuration.']);
    exit;
}

$requiredKeys = ['smtp_host', 'smtp_port', 'smtp_secure', 'smtp_username', 'smtp_password', 'from_email', 'to_email'];
foreach ($requiredKeys as $key) {
    if (!array_key_exists($key, $config) || $config[$key] === '' || $config[$key] === null) {
        error_log('send_email.php: missing or empty config key: ' . $key);
        echo json_encode(['status' => 'error', 'message' => 'Email configuration is incomplete.']);
        exit;
    }
}

$fullName = trim((string) ($_POST['full_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($fullName === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields with a valid email.']);
    exit;
}

$fullName = str_replace(["\r", "\n"], '', $fullName);
$email = str_replace(["\r", "\n"], '', $email);
$subject = str_replace(["\r", "\n"], '', $subject);

if ($subject === '') {
    $subject = 'Contact form message';
}

$fromName = trim((string) ($config['from_name'] ?? 'Website contact form'));
$body = "Name: {$fullName}\nEmail: {$email}\nSubject: {$subject}\n\n{$message}";

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = (string) $config['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->Username = (string) $config['smtp_username'];
    $mail->Password = (string) $config['smtp_password'];
    $mail->Port = (int) $config['smtp_port'];
    $mail->CharSet = PHPMailer::CHARSET_UTF8;

    $secure = strtolower((string) $config['smtp_secure']);
    $mail->SMTPSecure = $secure === 'tls' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;

    $mail->setFrom((string) $config['from_email'], $fromName);
    $mail->addAddress((string) $config['to_email']);
    if (!empty($config['bcc_email']) && filter_var($config['bcc_email'], FILTER_VALIDATE_EMAIL)) {
        $bcc = (string) $config['bcc_email'];
        if (strcasecmp($bcc, (string) $config['to_email']) !== 0) {
            $mail->addBCC($bcc);
        }
    }
    $mail->addReplyTo($email, $fullName);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->isHTML(false);

    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
} catch (PHPMailerException $e) {
    error_log('send_email SMTP: ' . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Could not send your message. Please try again later or use the email address on the site.',
    ]);
} catch (Throwable $e) {
    error_log('send_email: ' . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Could not send your message. Please try again later.',
    ]);
}
