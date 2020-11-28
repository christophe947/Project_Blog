<?php

namespace App\Controller;

use App\Framework\Controller;



class Home extends Controller {
    
   
    public function index() {
        $this->generateView();
    }

}