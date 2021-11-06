<?php

namespace App\Controller;

use App\Framework\Controller;
use App\Framework\Request;
use App\Repository\UserRepository;
use App\Validator\UserValidator;

use App\Model\User;




class Admin extends Controller {

   
    const ROLES = array(
        'visitor' => 10,
        'member' => 20,
        'admin' => 30,
        'top_admin' => 40
        );
      


    public function index() {
        $this->generateView();
    }

    
    public function personnalSpaceAdmin() {
        if ($_SESSION['auth']['role'] < self::ROLES['admin']) {
            header('Location: http://blog/index.php');       // redirection si pas admin
            exit();
        }
        $this->generateView();
    }

    public function memberDisplayPage() {
        if ($_SESSION['auth']['role'] < self::ROLES['admin']) {
            header('Location: http://blog/index.php');       // redirection si pas admin
            exit();
        }
        $action = new UserRepository;
        $members = $action->getMembers();

        if ($this->getRequest()->getSetting('admin') == 'delete') {
            $email = $this->getRequest()->getSetting('email');
            $role = $this->getRequest()->getSetting('role');
            if($role < $_SESSION['auth']["role"]){          //secu controller supression
            $user = new User();
            $user->setEmail($email);
            $action->deleteMember($user);
            header('location: http://blog/admin/memberDisplayPage');
        }}
        if ($this->getRequest()->getSetting('admin') == 'up') {
            $email = $this->getRequest()->getSetting('email');
            $role = $this->getRequest()->getSetting('role');
            
            if(($role < $_SESSION['auth']["role"]) && ($role === self::ROLES['visitor'] || self::ROLES['member'] || self::ROLES['admin'])) {
                
                $allKey = array_keys(self::ROLES);
                $key = array_search($role, self::ROLES); 
                $index = array_search($key, $allKey); 
                $nextKey = $allKey[$index + 1];
                $result = $nextKey;

                $user = new User();
                $user->setEmail($email);
                $user->setRole(self::ROLES[$result]);
                $action->updateProfilByAdmin($user);
                header('location: http://blog/admin/memberDisplayPage');
            }
        }
        if ($this->getRequest()->getSetting('admin') == 'down') {
            $email = $this->getRequest()->getSetting('email');
            $role = $this->getRequest()->getSetting('role');
            
            if(($role < $_SESSION['auth']["role"]) && ($role === self::ROLES['member'] || self::ROLES['admin'] || self::ROLES['top_admin']) && ($role > self::ROLES['visitor'])) {
                
                $allKey = array_keys(self::ROLES); var_dump($allKey); 
                $key = array_search($role, self::ROLES); 
                $index = array_search($key, $allKey);
                $previousKey = $allKey[$index - 1];
                $result = $previousKey;
               
                $user = new User();
                $user->setEmail($email);
                $user->setRole(self::ROLES[$result]);
                $action->updateProfilByAdmin($user);
                header('location: http://blog/admin/memberDisplayPage');
            }
        }
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