<?php

namespace App\Controller;

use App\Framework\Controller;


class Home extends Controller {
    
    public function index() {
        $this->generateView();
    }

    public function connect() {
        $this->generateView();
    }

    public function register() {
        $this->generateView();
    }

    public function article() {
        $this->generateView();
    }

    public function contact() {
        $this->generateView();
    }
}