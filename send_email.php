<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
    exit;
}

$fullName = trim((string) ($_POST['full_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($fullName === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields with a valid email.']);
    exit;
}

// Strip newlines so values cannot inject extra mail headers
$fullName = str_replace(["\r", "\n"], '', $fullName);
$subject = str_replace(["\r", "\n"], '', $subject);
if ($subject === '') {
    $subject = 'Contact form message';
}

$to = 'obaidkhanpro@gmail.com';

// IMPORTANT: Do not use the visitor's address as "From". Most hosts and receivers reject it (SPF/DMARC).
// Set this to an address that exists on your hosting account (e.g. cPanel → Email Accounts).
$host = preg_replace('/^www\./i', '', $_SERVER['SERVER_NAME'] ?? 'localhost');
$fromEmail = 'noreply@' . $host;

$headers =
    'From: Website contact <' . $fromEmail . ">\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    "MIME-Version: 1.0\r\n" .
    "Content-Type: text/plain; charset=UTF-8\r\n" .
    'X-Mailer: PHP/' . phpversion();

$fullMessage = "Name: {$fullName}\nEmail: {$email}\nSubject: {$subject}\n\n{$message}";

if (mail($to, $subject, $fullMessage, $headers)) {
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
} else {
    error_log('send_email.php: mail() failed. Check host sendmail/MTA or use SMTP.');
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to send the message. Your host may need PHP mail() configured, or use SMTP (e.g. PHPMailer).',
    ]);
}
