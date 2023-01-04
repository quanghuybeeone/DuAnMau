<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';
require '../lib/PHPMailer/src/Exception.php';

$email = $_GET['email'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lehuynhhieu.dll@gmail.com';                     //SMTP username
    $mail->Password   = 'uftdinmgjfixobbe';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lehuynhhieu.dll@gmail.com', 'OrganicFarm');
    $mail->addAddress("$email");     // Add a recipient
    // $mail->addReplyTo('lehuynhhieu.dll@gmail.com', 'Information');
    // $mail->addCC('nhokboss98@gmail.com');
    // $mail->addBCC('nhokboss98@gmail.com');

    // //Recipients
    // $mail->setFrom('lehuynhhieu.dll@gmail.com', 'Mailer');
    // $mail->addAddress('lehuynhhieu.dll@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('lehuynhhieu.dll@gmail.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sign up';
    $mail->Body    = 'Chúc mừng bạn đã đăng ký thành công trở thành viên của OrganicFarm';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
?>