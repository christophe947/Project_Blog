<?php

namespace App\Controller;

use App\Framework\Controller;
use App\Framework\Request;
use App\Repository\UserRepository;

use App\Model\User;




class Admin extends Controller {

      
    public function index() {
        $this->generateView();
    }

    public function redactArticle() {
        if ($_SESSION['auth']['role'] < 30) {
            header('Location: http://blog/index.php');
            exit();
        }  
        $this->generateView();
    }
    
    public function personnalSpaceAdmin() {
        if ($_SESSION['auth']['role'] < 30) {
            header('Location: http://blog/index.php');       // redirection si pas admin
            exit();
        }

        $actionListingMembers = new UserRepository;
        $members = $actionListingMembers->getMembers();
        //var_dump($members);
        $this->generateView([
            'members' => $members
        ]); 
    }

    public function viewProfilMembers() {
        if ($_SESSION['auth']['role'] < 30) {
            header('Location: http://blog/index.php');
            exit();  
        }  
        if ($this->getRequest()->getSetting('admin') == 'viewProfil') {
            $arrayProfil['pseudo'] = $pseudo = $this->getRequest()->getSetting('pseudo'); //htmlspecialchar
            $arrayProfil['email'] = $email = $this->getRequest()->getSetting('email');
            $arrayProfil['status'] = $status = $this->getRequest()->getSetting('status'); //htmlspecialchar
            $arrayProfil['created_at'] = $created_at = $this->getRequest()->getSetting('created_at');
            $arrayProfil['role'] = $role = $this->getRequest()->getSetting('role');
            $arrayProfil['newsletter'] = $newsletter = $this->getRequest()->getSetting('newsletter');
        }
        $this->generateView([
            'arrayProfil' => $arrayProfil
        ]);
    }

    














}