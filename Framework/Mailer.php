<?php

namespace App\Framework;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


class Mailer {

    //--    Local config    
    const LOCAL_HOST = 'localhost' ;
    const LOCAL_PORT = 1025;
    const LOCAL_SMTP_AUTH = false;
    const LOCAL_SMTP_SECURE = false;
    const LOCAL_SMTP_AUTOTLS = false;

    //--    Real config personnal
    const REAL_HOST = 'smtp.gmail.com' ;
    const REAL_PORT = 25;
    const REAL_SMTP_AUTH = true;
    const REAL_SMTP_SECURE = true;
    const REAL_SMTP_AUTO_TLS = false;
    const REAL_USERNAME = 'christophe.test.dev@gmail.com';
    const REAL_PASSWORD = '123456Dev';

    public function sendEmail($setFrom, $setFrom2, $addReplyTo, $addReplyTo2, $addAdress, $addAdress2, $subject, $AltBody, $content){
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //--SMTP param
        $mail->Host = self::LOCAL_HOST;
        $mail->Port = self::LOCAL_PORT;
        $mail->SMTPAuth = self::LOCAL_SMTP_AUTH;
        $mail->SMTPSecure = self::LOCAL_SMTP_SECURE;
        $mail->SMTPAutoTLS = self::LOCAL_SMTP_AUTOTLS;
        $mail->Username = $mail->SMTPautoTls = true  ? self::REAL_USERNAME : null;
        $mail->Password = $mail->SMTPautoTls = true  ? self::REAL_PASSWORD : null;

        //--Sending param
        $mail->setFrom($setFrom, $setFrom2);
        $mail->addReplyTo($addReplyTo, $addReplyTo2);
        $mail->addAddress($addAdress, $addAdress2);
        $mail->Subject = $subject;
        $mail->msgHTML($content);                       //msgHTML(file_get_contents(''), __DIR__);
        $mail->AltBody = $AltBody;
        
        //--Sending method
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }

}