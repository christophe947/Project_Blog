<?php

namespace App\Controller;

use App\Framework\Controller;



class Admin extends Controller {
    
    public function index() {
        $this->generateView();
    }
}