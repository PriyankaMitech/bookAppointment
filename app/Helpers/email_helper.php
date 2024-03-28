<?php
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';



    function sendConfirmationEmail($email, $ccEmails = [], $Subject=null, $msg=null, $otp=null, $password=null)
    {
        try {
          //  print_r($msg);die;
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'siddheshkadgemitech@gmail.com';
            $mail->Password = 'lxnpuyvyefpbcukr';
            $mail->SMTPSecure = 'tls';
            $mail->Port     = 587;
            $mail->setFrom('siddheshkadgemitech@gmail.com', 'Vedik');
            $mail->addAddress($email, 'Recipient Name');
            // print_r($ccEmails);die;
            if ($ccEmails) {
                foreach ($ccEmails as $ccEmail) {
                    $mail->addCC($ccEmail);
                }
            }
            
            $mail->isHTML(true);
            $mail->Subject = $Subject;
            $mail->Body = $msg;
          //  print_r($mail);die;
             $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
        
    }
