<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$messageSent = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shodorsonnath@gmail.com'; // Replace with your email
        $mail->Password = 'qekc zeud umop smvz'; // Replace with your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('shodorsondebnath@gmail.com', 'Shodorson Debnath');
        $mail->addAddress($_POST["email"]);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Share Document From One-Place Docs';
        $mail->Body    = $_POST["message"];

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
