<?php

namespace App\Services;

use App\Controller\Home;
use App\Framework\Mailer;


class Mail extends Mailer {

    public function sendEmailForRegister($user) {

        $mailPseudo = $user->getPseudo();
        $mailEmail = $user->getEmail();
        $mailToken = $user->getToken();
        $mailPassGoogle = $user->getPass2(); //prod
       
        $setFrom = 'jeanforteroch@gmail.com';
        $setFrom2 = 'Jean Forteroch';
        $addReplyTo = 'replyto@example.com';
        $addReplyTo2 = 'Reply Name';
        $addAdress = $mailEmail;
        $addAdress2 = $mailPseudo;
        $subject ='Confirmer votre Email, inscription BLOG Jean-Forteroche';
        $AltBody = 'This is a plain-text message body';
            //--Content
        $content = 'Bonjour ' . $addAdress2 . ', ';
        $content .= '<a href="http://blog/index.php?controller=home&action=confirmation&email=' . $addAdress . '&token=' . $mailToken . '">Cliquer ici pour confirmer votre adresse email.</a>';
        if(!empty($mailPassGoogle)) {
            $content .= 'vote mot de passe est : <strong>' . $mailPassGoogle . '</strong> vous pouvez le modifier a tout moment depuis vos parametre de profil';}
        $content .= ' Merci a bientot';
        
        $this->sendEmail($setFrom, $setFrom2, $addReplyTo, $addReplyTo2, $addAdress, $addAdress2, $subject, $AltBody, $content);
    }

    /*public function sendEmailForForgottenPassword($user) {
        $from = '';
        $to='';
        $subject ="Récupération d'accès à Jean-Forteroche";
        $content ='';

        $this->sendEmail();
    }*/
}