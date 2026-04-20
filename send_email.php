<?php
/**
 * Set to true temporarily while debugging: logs when PHP hands off to the server MTA.
 */
define('SEND_EMAIL_LOG_HANDOFF', false);

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

// Prevent header injection in fields used in mail headers / subject
$fullName = str_replace(["\r", "\n"], '', $fullName);
$email = str_replace(["\r", "\n"], '', $email);
$subject = str_replace(["\r", "\n"], '', $subject);

if ($subject === '') {
    $subject = 'Contact form message';
}

$to = 'bloomalden@proton.me';

// Same as your original working script: visitor as From/Reply-To (fixes vs old: validated email, no undefined $_POST)
$headers =
    'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$fullNameEsc = htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8');
$emailEsc = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$subjectEsc = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$messageEsc = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

$fullMessage = "Name: {$fullNameEsc}\nEmail: {$emailEsc}\nSubject: {$subjectEsc}\nMessage: {$messageEsc}";

if (mail($to, $subject, $fullMessage, $headers)) {
    if (SEND_EMAIL_LOG_HANDOFF) {
        error_log('[send_email] mail() handoff OK | to=' . $to . ' | subject=' . $subject . ' | from=' . $email);
    }
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
} else {
    error_log('send_email.php: mail() failed.');
    echo json_encode(['status' => 'error', 'message' => 'Failed to send the message.']);
}
