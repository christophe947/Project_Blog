<?php

namespace App\Validator;
use App\Controller\Home;
use App\Validator\Validate;


class UserValidator extends Validator {
    

    const PSEUDO_LENGTH = 25;
    const EMAIL_LENGTH = 25;
    const PASS_LENGTH = 25;
    const EMAIL_VAR_ON = 1;

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


    public function validatePseudo($value, $value1, $value2 = null) {                       //PSEUDO
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
        
    }



    public function validateEmail($value, $value1, $value2 = null) {                //EMAIL
       
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
        
    }


    public function validatePass($value, $value1, $value2 = null) {                   //PASS
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
                $this->error++;
                $this->msgErrorValidator['pass'] = "* les mdp doive etre pareil";
            }
        }
    }


}