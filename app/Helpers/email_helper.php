<?php
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';



// function sendConfirmationEmail($email, $ccEmails = [], $Subject=null, $msg=null, $otp=null, $password=null, $sameValues=null)
// {
// //    print_r($msg);die;
// try {
// $mail = new PHPMailer(true);
// $mail->isSMTP();
// $mail->Host = 'mail.vedikastrologer.com'; // Replace 'webmail.example.com' with your webmail SMTP host
// $mail->SMTPAuth = true;
// $mail->Username = 'mrunal@vedikastrologer.com'; // Replace with your webmail username
// $mail->Password = 'Happy@2024'; // Replace with your webmail password
// $mail->SMTPSecure = 'tls'; // or 'ssl' if your provider supports SSL encryption
// $mail->Port = 587; // or the port provided by your webmail provider
// // $mail->Port = 465;

// $mail->setFrom('mrunal@vedikastrologer.com', 'Vedik'); // Replace with your webmail email address and sender name
// $mail->addAddress($email, 'Recipient Name');

// // Add CC emails
// if ($ccEmails) {
// foreach ($ccEmails as $ccEmail) {
// $mail->addCC($ccEmail);
// }
// }

// // Add CC emails with same values
// if ($sameValues) {
// foreach ($ccEmails as $ccEmail) {
// $mail->addCC($ccEmail, 'Recipient Name');
// }
// }

// $mail->isHTML(true);
// $mail->Subject = $Subject;
// $mail->Body = $msg;
// $mail->send();
// // echo $respone;exit();
// } catch (Exception $e) {
// echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
// return false;
// }
// }


function sendConfirmationEmail($email, $ccEmails = [], $receiverSubject=null, $receiverMsg=null, $senderSubject=null, $senderMsg=null, $otp=null, $password=null, $sameValues=null)
{
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.vedikastrologer.com'; // Replace 'mail.vedikastrologer.com' with your webmail SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'mrunal@vedikastrologer.com'; // Replace with your webmail username
        $mail->Password = 'Happy@2024'; // Replace with your webmail password
        $mail->SMTPSecure = 'tls'; // or 'ssl' if your provider supports SSL encryption
        $mail->Port = 587; // or the port provided by your webmail provider

        $mail->setFrom('mrunal@vedikastrologer.com', 'Vedik'); // Replace with your webmail email address and sender name
        $mail->addAddress($email, 'Recipient Name');

        // Add CC emails
        if ($ccEmails) {
            foreach ($ccEmails as $ccEmail) {
                $mail->addCC($ccEmail);
            }
        }

        // Add CC emails with same values
        if ($sameValues) {
            foreach ($ccEmails as $ccEmail) {
                $mail->addCC($ccEmail, 'Recipient Name');
            }
        }

        $mail->isHTML(true);

        // Receiver's email
        $mail->Subject = $receiverSubject;
        $mail->Body = $receiverMsg;
        $mail->send();

        // Sender's email
        $mail->clearAddresses();
        $mail->addAddress('sender@example.com', 'Sender Name'); // Replace with sender's email and name
        $mail->Subject = $senderSubject;
        $mail->Body = $senderMsg;
        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

