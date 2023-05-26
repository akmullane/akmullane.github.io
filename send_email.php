<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Mailtrap configuration
    $smtp_host = 'smtp.mailtrap.io';
    $smtp_port = 2525;
    $smtp_username = '077b2a1094be7a';
    $smtp_password = '2cad70a7d57de6';
    $from_email = 'gain921@gmail.com';
    $from_name = 'Gain-send';
    $to_email = 'gain921@gmail.com';
    $to_name = 'Gain-reciever';

    // Compose the email
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send the email
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/plain; charset=iso-8859-1',
        "From: $from_name <$from_email>",
        "Reply-To: $name <$email>",
        "X-Mailer: PHP/" . phpversion()
    ];

    $smtp = fsockopen($smtp_host, $smtp_port);
    if ($smtp) {
        fputs($smtp, "EHLO " . $_SERVER['SERVER_NAME'] . "\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "AUTH LOGIN\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, base64_encode($smtp_username) . "\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, base64_encode($smtp_password) . "\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "MAIL FROM: <$from_email>\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "RCPT TO: <$to_email>\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "DATA\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "Subject: $subject\r\n");
        fputs($smtp, implode("\r\n", $headers) . "\r\n\r\n");
        fputs($smtp, "$body\r\n.\r\n");
        $response = fgets($smtp, 515);
        fputs($smtp, "QUIT\r\n");
        fclose($smtp);
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
