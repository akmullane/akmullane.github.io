<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    require 'path/to/PHPMailer/src/PHPMailer.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->Port = 2525;
    $mail->SMTPAuth = true;
    $mail->Username = '077b2a1094be7a';
    $mail->Password = '2cad70a7d57de6';



    // Set the sender and recipient
    $mail->setFrom('sender@example.com', 'Sender Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Set email subject and body
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email.';

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
}
?>
