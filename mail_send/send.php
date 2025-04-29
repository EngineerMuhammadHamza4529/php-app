<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php_mailer/Exception.php';
require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_OFF;                     // Disable verbose debug output
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'hamza.shaikh4529@gmail.com';             // SMTP username
        $mail->Password   = 'zrso nmjy bakr liet';                    // SMTP password (use App Password for Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable implicit TLS encryption
        $mail->Port       = 465;                                // TCP port to connect to

        //Recipients
        $mail->setFrom('hamza.shaikh4529@gmail.com', 'Contact Form');
        $mail->addAddress('shokhan5430@gmail.com');       // Add a recipient

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h3>Contact Form Submission</h3>
                          <p><b>Name:</b> $name</p>
                          <p><b>Email:</b> $email</p>
                          <p><b>Message:</b></p><p>$message</p>";

        $mail->send();
        echo 'Message has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
