<?php

namespace App\Controller;

use App\Framework\Controller;
use App\Framework\Request;
use App\Model\User;
use App\Repository\UserRepository;
use App\Services\Mail;
use App\Validator\UserValidator;



class Home extends Controller {

    const ROLE_BANN = 0;
    const ROLE_VISITOR = 10;
    const ROLE_MEMBER = 20;
    const ROLE_ADMIN = 30;
    const ROLE_SUPER_ADMIN = 99;

    public function index() {
        
        $this->generateView();
    }

    public function connect() {

        $errors = 0;
        $msgErrorValidator = 0;
        
        if ($this->getRequest()->getSetting('user') == 'connect') {
            $email = $this->getRequest()->getSetting('email');
            $pass = $this->getRequest()->getSetting('mdp');
            
            $user = new User();
            $user->setEmail($email);
            $user->setPass($pass);
        
            $validator = new UserValidator();                                   
            $errors = $validator->validateConnecting($user);

            if ($errors) {

                $userAction = new UserRepository();    
                $value = $userAction->checkForConnect2($user);

                if(!empty($value)) {

                    $getPass = $value['password']; 
                  
                    $verif = password_verify($pass, $getPass);
                   
                    if($verif == true) {
                       
                        $getData = $userAction->getUser($user);
                     
                        $_SESSION = array();
                        $_SESSION['auth']['pseudo'] = $getData['pseudo'];
                        $_SESSION['auth']['email'] = $getData['email'];
                        $_SESSION['auth']['status'] = $getData['status'];
                        $_SESSION['auth']['created_at'] = $getData['created_at'];
                        $_SESSION['auth']['role'] = $getData['role'];
                        $_SESSION['auth']['newsletter'] =$getData['newsletter'];

                        if ($_SESSION['auth']['role'] == 30) {
                            header('location: /admin/personnalSpaceAdmin');
                        }
                        header('location: /home/personnalSpace');
                    }
                }
            }
            $msgErrorValidator = $validator->getMsgerror();
        }
        $this->generateView([
            'msgErrorValidator' => $msgErrorValidator
        ]);
    }

    public function register() {

        $errors = 0;
        $msgErrorValidator = 0;
        
        if ($this->getRequest()->getSetting('user') == 'register') {
            $pseudo = $this->getRequest()->getSetting('pseudo');
            $email = $this->getRequest()->getSetting('email');
            $pass = $this->getRequest()->getSetting('pass');
            $pass2 = $this->getRequest()->getSetting('pass2');
           
            $user = new User();

            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setPass2($pass2);

            $validator = new UserValidator();
            $errors = $validator->validateRegister($user);

            if ($errors) {

                $tokenBeta = random_bytes(5);
                $token = bin2hex($tokenBeta);

                $pass = password_hash($pass, PASSWORD_BCRYPT);
                $pass2 = null;

                $user->setPass($pass);
                $user->setPass2($pass2);
                $user->setDate(date('Y-m-d H:i:s'));
                $user->setStatut('0');
                $user->setRole(self::ROLE_VISITOR);
                $user->setNewsletter('0');
                $user->setToken($token);

                $userAction = new UserRepository();    
                $userAction->register($user);

                $mail = new Mail();
                $mail->sendEmailForRegister($user);
               
                $_SESSION['message']['class'] = "success";
                $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp felicitation votre enregistrement est bien pris en compte il vous restera a comfirmer votre e-mail. &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
              
                header('Location: http://blog/index.php');     
            }
            $msgErrorValidator = $validator->getMsgerror();
        }
    
        $this->generateView([
            'msgErrorValidator' => $msgErrorValidator
        ]);   
    }

    public function article() {
       
        $this->generateView();
    }

    public function personnalSpace() {
        if ($_SESSION['auth']['role'] < 20) {
            unset($_SESSION['auth']);
            header('Location:/home/index');
            exit();
        }
        $this->generateView();
    }

    public function contact() {
        
        $this->generateView();
    }
    
    public function deconnection() {
        if ($this->getRequest()->getSetting('user') == 'deco') { 
           
            $_SESSION = array(); 
            unset($_SESSION['auth']);
            session_destroy();
            header("location:/home/index"); //ok
        }
    }

    public function updateProfil() {
        if ($_SESSION['auth']['role'] < 20) {
            header('Location:/home/index');
            exit();
        }

        $errors = 0;
        $msgErrorValidator = 0;
        
        if ($this->getRequest()->getSetting('user') == 'update') {
            $pseudo = $this->getRequest()->getSetting('pseudo');
            $email = $this->getRequest()->getSetting('email');
            $pass = $this->getRequest()->getSetting('pass');
            $pass2 = $this->getRequest()->getSetting('pass2');
           
            $user = new User();

            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setPass2($pass2);

            $validator = new UserValidator();
            $errors = $validator->updateRegister($user);

            if ($errors) {
                $pass = password_hash($pass, PASSWORD_BCRYPT);
                $pass2 = null;

                $user->setPass($pass);
                $user->setPass2($pass2);
                
                $userAction = new UserRepository();    
                $userAction->updateProfil($user);
                
                $getData = $userAction->getUser($user);
                     
                        $_SESSION['auth']['pseudo'] = $getData['pseudo'];
                        $_SESSION['auth']['email'] = $getData['email'];
                     
                header('Location: http://blog/index.php');     
            }
            $msgErrorValidator = $validator->getMsgerror();
        }

        $this->generateView([
            'msgErrorValidator' => $msgErrorValidator
        ]);
    }

    public function confirmation() {

        $email = $this->getRequest()->getSetting('email');
        $token = $this->getRequest()->getSetting('token');
        
        $user = new User;
        $user->setToken($token);
        $userAction = new UserRepository();
        $comparDataUser = $userAction->getUser($user);
       
        $getPseudoDB = $comparDataUser['pseudo'];
        $getEmailDB = $comparDataUser['email'];
        
        if(empty($getPseudoDB) || $getEmailDB !== $email){
           
            $_SESSION['message']['class'] = "denied";
            $_SESSION['message']['content'] = " <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>
              &nbsp &nbsp Vous n'avez pas ou plus l'autorisation d'acces a cette page. &nbsp <a class=\"deniedLink\" href=index.php>Continuer la navigation sur le site...</a>&nbsp &nbsp <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>";
          
            header('Location: home');
        } 
            $user->setRole(self::ROLE_MEMBER);
            $user->setStatut('1');
            $user->setEmail($email);
            $user->setToken($token);
            $userAction->updateRegister($user);
            header('Location: home');   
    }
}