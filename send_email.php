<?php
$subject = $_POST['subject'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'send.one.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rupinder@greentanartisan.dk';                     //SMTP username
    $mail->Password   = 'rupi@786';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rupinder@greentanartisan.dk', 'Contact Us');
    $mail->addAddress('rupindermahajan@gmail.com', 'Rupi');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test Contact Form';
    $mail->Body    = "Subject -$subject <br>Sender Name - $name <br> Sender Email - $email <br> Message - $message";

    $mail->send();
    echo "<script>alert('Message sent successfully!')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>