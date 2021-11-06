<?php

namespace App\Services;

use App\Controller\Home;
use App\Framework\GLogin;


class MyGLogin extends GLogin {

   public function superLogin($paramUrl) {

    $this->login($paramUrl);
    //$this->lala();
   }
}