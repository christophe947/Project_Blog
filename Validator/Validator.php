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

}
    


