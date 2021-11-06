<?php

namespace App\Validator;

use App\Repository\UserRepository;


class Validator {

    public function validateIsNotEmpty($value) {
        if(empty($value)) {
            return true;
        }
        return false;
    }

    public function validateIsNotGranted($value, $lenght) {
        if (strlen($value) > $lenght) {
            return true;
        }
        return false;
    }

    public function validateIsNotDifferent($value, $value2) {
        if ($value !== $value2) {
            return true;
        }
        return false;
    }

    
    public function existingPseudoEmail($value) {
        $init = new UserRepository;
        $data = $init->isUseInBddPseudoEmail($value);
        //var_dump($data);
        if(!empty($data)){
            return true;
        }
        return false;
    }

    public function existingPseudoEmailUpdate($value, $value3) {
        $init = new UserRepository;
        $data = $init->isUseInBddPseudoEmailUpdate($value, $value3);
        //var_dump($data);
        if(!empty($data)){
            return true;
        }
        return false;
    }
}
    
//      password_hash($pass, $options = PASSWORD_BCRYPT);
        //      $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
        //      password_verify($pass, $hash);





