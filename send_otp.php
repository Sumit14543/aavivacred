<?php
declare(strict_types=1);
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/config/config.php';

// Simple SMTP Mailer Function
function send_smtp_email($to, $subject, $body) {
    $host = 'ssl://smtp.hostinger.com';
    $port = 465;
    $username = 'noreply@aavivacred.com';
    $password = 'Aaviva@321@#@#';

    $socket = @fsockopen($host, $port, $errno, $errstr, 10);
    if (!$socket) {
        return "Could not connect to SMTP server: $errstr ($errno)";
    }

    function read_response($socket, $expected) {
        $response = '';
        while (substr($response, 3, 1) !== ' ') {
            $line = fgets($socket, 512);
            if ($line === false) break;
            $response = $line;
        }
        if (intval(substr($response, 0, 3)) !== $expected) {
            return "SMTP Error: " . $response;
        }
        return true;
    }

    $res = read_response($socket, 220);
    if ($res !== true) return $res;

    fwrite($socket, "EHLO localhost\r\n");
    $res = read_response($socket, 250);
    if ($res !== true) return $res;

    fwrite($socket, "AUTH LOGIN\r\n");
    $res = read_response($socket, 334);
    if ($res !== true) return $res;

    fwrite($socket, base64_encode($username) . "\r\n");
    $res = read_response($socket, 334);
    if ($res !== true) return $res;

    fwrite($socket, base64_encode($password) . "\r\n");
    $res = read_response($socket, 235);
    if ($res !== true) return $res;

    fwrite($socket, "MAIL FROM: <{$username}>\r\n");
    $res = read_response($socket, 250);
    if ($res !== true) return $res;

    fwrite($socket, "RCPT TO: <{$to}>\r\n");
    $res = read_response($socket, 250);
    if ($res !== true) return $res;

    fwrite($socket, "DATA\r\n");
    $res = read_response($socket, 354);
    if ($res !== true) return $res;

    $headers = [
        "MIME-Version: 1.0",
        "Content-type: text/html; charset=utf-8",
        "To: <{$to}>",
        "From: AavivaCred <{$username}>",
        "Subject: {$subject}",
        "Date: " . date('r'),
        "Message-ID: <" . md5(uniqid()) . "@aavivacred.com>"
    ];

    $data = implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n.\r\n";
    fwrite($socket, $data);
    $res = read_response($socket, 250);
    if ($res !== true) return $res;

    fwrite($socket, "QUIT\r\n");
    fclose($socket);
    return true;
}

// Process POST request
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true);

$email = '';
if (isset($json_data['email'])) {
    $email = trim($json_data['email']);
} elseif (isset($_POST['email'])) {
    $email = trim($_POST['email']);
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address.'
    ]);
    exit;
}

// Generate 6-digit OTP
$otp = (string)rand(100000, 999999);
$_SESSION['email_otp'] = $otp;
$_SESSION['email_otp_target'] = $email;

$subject = "Your AavivaCred Verification Code: $otp";
$body = "
<html>
<head>
<style>
    body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #0f172a; padding: 20px; }
    .card { background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 30px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    h2 { font-size: 20px; font-weight: 800; color: #021435; margin-bottom: 10px; }
    p { font-size: 14px; line-height: 1.6; color: #475569; }
    .otp-code { font-size: 32px; font-weight: 800; color: #0284c7; letter-spacing: 6px; text-align: center; padding: 15px; background-color: #f1f5f9; border-radius: 12px; margin: 20px 0; }
    .footer { font-size: 11px; color: #94a3b8; text-align: center; margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 15px; }
</style>
</head>
<body>
    <div class='card'>
        <h2>Verify Your Email Address</h2>
        <p>Thank you for starting your loan application with AavivaCred. Please use the verification code below to verify your email address and continue your application.</p>
        <div class='otp-code'>$otp</div>
        <p>This code is valid for 10 minutes. If you did not request this verification code, please ignore this email.</p>
        <div class='footer'>
            &copy; " . date('Y') . " AavivaCred Financial Services Pvt. Ltd. All rights reserved.
        </div>
    </div>
</body>
</html>
";

$mailResult = send_smtp_email($email, $subject, $body);

if ($mailResult === true) {
    echo json_encode([
        'success' => true,
        'message' => 'OTP sent successfully to your email.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'email_sent' => false,
        'otp' => $otp,
        'message' => $mailResult
    ]);
}
