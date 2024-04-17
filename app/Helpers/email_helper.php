<?php
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';



function sendConfirmationEmail($email, $ccEmails = [], $Subject=null, $msg=null, $otp=null, $password=null, $sameValues=null)
{
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mrunal@vedikastrologer.com';
        $mail->Password = 'Happy@2024';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->setFrom('mrunal@vedikastrologer.com', 'Vedik');
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
        $mail->Subject = $Subject;
        $mail->Body = $msg;
        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
