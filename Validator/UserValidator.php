<?php

namespace App\Validator;
use App\Controller\Home;
use App\Validator\Validate;


class UserValidator extends Validator {
    

    const PSEUDO_LENGTH = 25;
    const EMAIL_LENGTH = 25;
    const PASS_LENGTH = 35;
    const TITLE_LENGTH = 20;
    const EMAIL_VAR_ON = 1;
    const VAR_ON = 1;

    private $error = 0;
    private $msgErrorValidator = [];
    
    public function getMsgError() {
        if ($this->error !== 0) {
            return $this->msgErrorValidator;
        }
        return true;
    }


    public function validateRegister($user) {

        $pseudo = $user->getPseudo();
        $email = $user->getEmail();
        $pass = $user->getPass();
        $pass2 = $user->getPass2();

        $this->validatePseudo($pseudo, self::PSEUDO_LENGTH, self::EMAIL_VAR_ON);
        $this->validateEmail($email, self::EMAIL_LENGTH, self::EMAIL_VAR_ON);
        $this->validatePass($pass, self::PASS_LENGTH, $pass2);
        
        if ($this->error == 0) {
            return true;
        }
        return false;
    }

    public function updateRegister($user) {  //fonction nom en doublon dans repossitory aussi

        $pseudo = $user->getPseudo();
        $email = $user->getEmail();
        $pass = $user->getPass();
        //$pass2 = $user->getPass2();
        $pass3 = $user->getPass3();
        $pass4 = $user->getPass4();

        $this->validatePseudo($pseudo, self::PSEUDO_LENGTH, null, $_SESSION['auth']['pseudo']);
        $this->validateEmail($email, self::EMAIL_LENGTH, null,  $_SESSION['auth']['email']);
        $this->validatePass($pass, self::PASS_LENGTH/*, $pass2*/);
       if (!empty($pass3 /*|| $pass4*/)) { $this->validatePass($pass3, self::PASS_LENGTH, $pass4, self::VAR_ON); }
        //var_dump($_SESSION['auth']['pseudo']);
        if ($this->error == 0) {
            return true;
        }
        return false;
    }

    public function validateConnecting($user) {

        $email = $user->getEmail();
        $pass = $user->getPass();

        $this->validateEmail($email, self::EMAIL_LENGTH);
        $this->validatePass($pass, self::PASS_LENGTH);
        
        if ($this->error == 0) {
            return true;
        }
        return false;
    }


    public function validatePseudo($value, $value1, $value2 = null, $value3 = null) {                       //PSEUDO
        if ($this->validateIsNotEmpty($value)){
            $this->error++;
            $this->msgErrorValidator['pseudo'] = "* pseudo requis";
        }
        if($this->validateIsNotGranted($value, $value1)){
            $this->error++;
            $this->msgErrorValidator['pseudo'] = "* le pseudo doit tre compris entre x et x caractere";
        }
        if ($value2 != null) {
            if($this->existingPseudoEmail($value)){
                $this->error++;
                $this->msgErrorValidator['pseudo'] = "* le pseudo deja utiliser";
            }
        } 
        if ($value3 != null) {
            if($this->existingPseudoEmailUpdate($value, $value3)){
                $this->error++;
                $this->msgErrorValidator['pseudo'] = "* le pseudo nouveau deja utiliser";
            }
        } 
    }



    public function validateEmail($value, $value1, $value2 = null, $value3 = null) {                //EMAIL
       
        if ($this->validateIsNotEmpty($value)){
            $this->error++;
            $this->msgErrorValidator['email'] = "* email requis";
        }
        if($this->validateIsNotGranted($value, $value1)){
            $this->error++;
            $this->msgErrorValidator['email'] = "* l'email doit tre compris entre x et x caractere";
        } 
        if ($value2 != null) {
            if($this->existingPseudoEmail($value)){
                $this->error++;
                $this->msgErrorValidator['email'] = "* le email deja utiliser";
            }
        }
        if ($value3 != null) {
            if($this->existingPseudoEmailUpdate($value, $value3)){
                $this->error++;
                $this->msgErrorValidator['email'] = "* le email nouveau deja utiliser";
            }
        } 
    }


    public function validatePass($value, $value1, $value2 = null, $value3 = null) {                   //PASS
        if ($this->validateIsNotEmpty($value)){
            $this->error++;
            $this->msgErrorValidator['pass'] = "* mdp requis";
        }
        if($this->validateIsNotGranted($value, $value1)){
            $this->error++;
            $this->msgErrorValidator['pass'] = "* le mot de pass doit tre compris entre x et x caractere";
        }
        if ($value2 != null) {
            if($this->validateIsNotDifferent($value , $value2)){
                if($value3 != null){
                    $this->error++;
                    $this->msgErrorValidator['passBis'] = "* les nouveau mdp doivent etre identiques";
                } else if ($value3 = null){
                    $this->error++;
                    $this->msgErrorValidator['pass'] = "* les mdp doivent etre identiques Bis";
                }


                //}
            }
        }
    }


}