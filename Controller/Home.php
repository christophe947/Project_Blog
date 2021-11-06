<?php

namespace App\Controller;

//use \Exception;
use App\Framework\Controller;
use App\Framework\Request;
use App\Model\User;
use App\Repository\UserRepository;
use App\Services\Mail;
use App\Validator\UserValidator;
use App\Framework\GLogin;
use App\Services\MyGLogin;
use Google_Client;
use Google_Service_Oauth2;

require_once '../vendor/autoload.php';

class Home extends Controller {

    const PARAM_ON = 1;
    const ROLE_BANN = 0;
    const ROLE_VISITOR = 10;
    const ROLE_MEMBER = 20;
    const ROLE_ADMIN = 30;
    const ROLE_SUPER_ADMIN = 99;

    const GOOGLE_CLIENT_ID = '612446309759-3kt2b3u890nl8jcarm9quca1g438oim3.apps.googleusercontent.com';
    const GOOGLE_CLIENT_SECRET = 'vdWPZM122F-puDDih6gFy3a2';
    const GOOGLE_REDIRECT_URL_REGISTER = 'http://localhost/projet_blog/public/index.php?controller=home&action=googleData';
    const GOOGLE_REDIRECT_URL_CONNECT = 'http://localhost/projet_blog/public/index.php?controller=home&action=connect&param=on';
    const GOOGLE_SCOPE_1 = 'profile';
	const GOOGLE_SCOPE_2 = 'email';


    public function index() {  
        if($this->getRequest()->getSetting('param')){
            
            $_SESSION['message']['class'] = "success";
            $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp felicitation votre enregistrement est bien pris en compte il vous restera a comfirmer votre e-mail. &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
            
        }
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
                        $_SESSION['auth']['id'] = $getData['id'];
                        $_SESSION['auth']['pseudo'] = $getData['pseudo'];
                        $_SESSION['auth']['email'] = $getData['email'];
                        $_SESSION['auth']['status'] = $getData['status'];
                        $_SESSION['auth']['created_at'] = $getData['created_at'];
                        $_SESSION['auth']['role'] = $getData['role'];
                        $_SESSION['auth']['newsletter'] =$getData['newsletter'];
                        if ($_SESSION['auth']['role'] == 30) {
                            header('location: /admin/personnalSpaceAdmin');
                        } else if ($_SESSION['auth']['role'] == 20) {
                            header('location: /home/personnalSpace');
                        } else if ($_SESSION['auth']['role'] == 10) {
                            unset($_SESSION['auth']);
                $_SESSION['message']['class'] = "denied";
                $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp le profil n'a pas encore été verifié par e-mail &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
              
                            header('location: http://blog/index.php');}
                    }
                }
            }
            $msgErrorValidator = $validator->getMsgerror();
        } else if ($this->getRequest()->getSetting('user') == 'connectGoogle') {
            $logGoogle = new MyGLogin();
            $paramUrl = self::GOOGLE_REDIRECT_URL_CONNECT;//'http://localhost/projet_blog/public/index.php?controller=home&action=googleDataConnect';
            $logGoogle->superLogin($paramUrl);
        }
        if($this->getRequest()->getSetting('param')){
            
            $client = new Google_client();
            $client->setClientId(self::GOOGLE_CLIENT_ID);
            $client->setClientSecret(self::GOOGLE_CLIENT_SECRET);
            $client->setRedirectUri(self::GOOGLE_REDIRECT_URL_CONNECT);
            $client->addScope(self::GOOGLE_SCOPE_1);
            $client->addScope(self::GOOGLE_SCOPE_2);
    
            $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
            $client->setHttpClient($guzzleClient);
    
            if(isset($_GET['code'])){
                $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
                $tokenAccess = $_GET['code'];
                $client->setAccessToken($token);
            
                $gauth = new Google_Service_Oauth2($client);
                $google_info = $gauth->userinfo->get();
                $email = $google_info->email;
                $name = $google_info->name;
                var_dump($name, $email);
            }
            if(!empty($email)){
                var_dump('fejfeosigjvsoiegl');
                var_dump($email);
                header('location: http://blog/index.php?controller=home&action=connect&param2=on&email='. $email .'');
                exit();}
        }
            if($this->getRequest()->getSetting('param2')){
                $email = $this->getRequest()->getSetting('email'); 
                $user = new User();
                $user->setEmail($email);
                var_dump($user);
    //exit();
                $userAction = new UserRepository();    
                $value = $userAction->checkForConnect2($user, self::PARAM_ON);
                var_dump($value);
                
                if(!empty($value)) {
                    $getData = $userAction->getUser($user);
                         
                            $_SESSION = array();
                            $_SESSION['auth']['id'] = $getData['id'];
                            $_SESSION['auth']['pseudo'] = $getData['pseudo'];
                            $_SESSION['auth']['email'] = $getData['email'];
                            $_SESSION['auth']['status'] = $getData['status'];
                            $_SESSION['auth']['created_at'] = $getData['created_at'];
                            $_SESSION['auth']['role'] = $getData['role'];
                            //$getRole = $getData['role'];
                            $_SESSION['auth']['newsletter'] = $getData['newsletter'];
                            //var_dump($_SESSION);
                            //var_dump($user);
                            //exit();
                            if ($_SESSION['auth']['role'] == 20) {
                                header('location: http://blog/index.php?controller=home&action=personnalSpace');
                                //header('location: /home/personnalSpace');
                            } else if ($_SESSION['auth']['role'] == 10) {
                                unset($_SESSION['auth']);             
                                $_SESSION['message']['class'] = "denied";
                                $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp le profil n'a pas encore été verifié par e-mail &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
                                header('location: http://blog/index.php');
                            }





            /*$userAction = new UserRepository();
            $user = new User(); 
            var_dump($user);
            //exit();
            $getData = $userAction->getUser($user);
                     
            $_SESSION = array();
            $_SESSION['auth']['pseudo'] = $getData['pseudo'];
            $_SESSION['auth']['email'] = $getData['email'];
            $_SESSION['auth']['status'] = $getData['status'];
            $_SESSION['auth']['created_at'] = $getData['created_at'];
            $_SESSION['auth']['role'] = $getData['role'];
            $_SESSION['auth']['newsletter'] = $getData['newsletter'];

            if ($_SESSION['auth']['role'] == 20) {
                //header('location: http://blog/index.php?controller=home&action=connect&param=on');
                header('location: /home/personnalSpace');
            } else if ($_SESSION['auth']['role'] == 10) {
                unset($_SESSION['auth']);             
                $_SESSION['message']['class'] = "denied";
                $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp le profil n'a pas encore été verifié par e-mail &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
                header('location: http://blog/index.php');
            }*/
              }}  //}

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
        } else if ($this->getRequest()->getSetting('user') == 'registerGoogle') {

            $logGoogle = new MyGLogin();
            $paramUrl = self::GOOGLE_REDIRECT_URL_REGISTER;//'http://localhost/projet_blog/public/index.php?controller=home&action=googleData';
            $logGoogle->superLogin($paramUrl);
        }
        $this->generateView([
            'msgErrorValidator' => $msgErrorValidator
        ]);   
    }

   /* public function GoogleDataConnect() {
       $errors = 0;
        $msgErrorValidator = 0;
       
        $client = new Google_client();
	    $client->setClientId(self::GOOGLE_CLIENT_ID);
	    $client->setClientSecret(self::GOOGLE_CLIENT_SECRET);
	    $client->setRedirectUri(self::GOOGLE_REDIRECT_URL_CONNECT);
	    $client->addScope(self::GOOGLE_SCOPE_1);
	    $client->addScope(self::GOOGLE_SCOPE_2);

        $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $client->setHttpClient($guzzleClient);

        if(isset($_GET['code'])){
            $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
            $tokenAccess = $_GET['code'];
            $client->setAccessToken($token);

            $gauth = new Google_Service_Oauth2($client);
            $google_info = $gauth->userinfo->get();
            $email = $google_info->email;
            $name = $google_info->name;

            $user = new User();
            $user->setEmail($email);
//exit();
            $userAction = new UserRepository();    
            $value = $userAction->checkForConnect2($user, self::PARAM_ON);
            var_dump($value);
            
            if(!empty($value)) {
                $getData = $userAction->getUser($user);
                     
                        //$_SESSION = array();
                        //$_SESSION['auth']['pseudo'] = $getData['pseudo'];
                        //$_SESSION['auth']['email'] = $getData['email'];
                        //$_SESSION['auth']['status'] = $getData['status'];
                        //$_SESSION['auth']['created_at'] = $getData['created_at'];
                        //$_SESSION['auth']['role'] = $getData['role'];
                        $getRole = $getData['role'];
                        //$_SESSION['auth']['newsletter'] = $getData['newsletter'];
                        if ($getRole == 20) {
                            header('location: http://blog/index.php?controller=home&action=connect&param=on');
                            //header('location: /home/personnalSpace');
                        } else if ($_SESSION['auth']['role'] == 10) {
                            unset($_SESSION['auth']);             
                            $_SESSION['message']['class'] = "denied";
                            $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp le profil n'a pas encore été verifié par e-mail &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
                            header('location: http://blog/index.php');
                        }
            }
        }
        $this->generateView();
    }*/

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
        $varEmail = 0;
        if ($this->getRequest()->getSetting('user') == 'update') {
            $pseudo = $this->getRequest()->getSetting('pseudo');
            $email = $this->getRequest()->getSetting('email');
            $pass = $this->getRequest()->getSetting('pass');
            $pass3 = $this->getRequest()->getSetting('pass3');
            $pass4 = $this->getRequest()->getSetting('pass4');
           
            $user = new User();
            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setPass3($pass3);
            $user->setPass4($pass4);
            
            $validator = new UserValidator();
            $errors = $validator->updateRegister($user);
    
            if ($errors) {
                $pass4 = null;
                $user->setPass4($pass4);
            
                if (!empty($pass3)) {
                    $pass3 = password_hash($pass3, PASSWORD_BCRYPT);
                    $user->setPass3($pass3);
                } 
                if ($_SESSION['auth']['email'] !== $email) {
                    $varEmail = 1;
                }
                $userAction = new UserRepository();    
                $value = $userAction->checkForUpdate($user);

                if(!empty($value)) {
                    $getPass = $value['password']; 
                    $verif = password_verify($pass, $getPass);
              
                    if($verif == true) {       //bon mdp originaux
                        if(!empty($pass3) && ($varEmail == 0)){
                            $pass3 = password_hash($pass3, PASSWORD_BCRYPT);
                            $userAction->updateProfil($user);
                        } else if (empty($pass3) && ($varEmail == 0)){
                            $userAction->updateProfil($user, self::PARAM_ON);  
                        }
                        if ($varEmail == 1) {        //si changement d email recoenction et confirmation
                            
                            $user->setRole(self::ROLE_VISITOR);
                            $user->setStatut('0');
                            $tokenBeta = random_bytes(5);
                            $token = bin2hex($tokenBeta);
                            $user->setToken($token);

                            $userAction->updateRegister($user);
                            
                            if(!empty($pass3)){
                                $pass3 = password_hash($pass3, PASSWORD_BCRYPT);
                                $userAction->updateProfil($user);
                            } else if (empty($pass3)){
                                $userAction->updateProfil($user, self::PARAM_ON);  
                            }                          
            
                            $mail = new Mail();
                            $mail->sendEmailForRegister($user);
               
                            
                            $_SESSION = array(); 
                            unset($_SESSION['auth']);
                            session_destroy();
                            session_start(); //test message flash

                            $_SESSION['message']['class'] = "success";
                            $_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp felicitation votre modification d'email est bien pris en compte il vous restera a comfirmer celui-ci. &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
                            
                            header('Location: http://blog/index.php');
                        }

                        $getData = $userAction->getUser($user);
                        $_SESSION['auth']['pseudo'] = $getData['pseudo'];
                        $_SESSION['auth']['email'] = $getData['email'];
                     
                    header('Location: http://blog/home/personnalSpace/');     
                }
             }
            }
            $msgErrorValidator = $validator->getMsgerror();
        }
        $this->generateView([
            'msgErrorValidator' => $msgErrorValidator
        ]);
    }

    public function googleData() {   //googleDataRegister pour url deretour avc action register different de connect ou parametrer l'url et filtre par get requet 
    
        $errors = 0;
        $msgErrorValidator = 0;
       
        $client = new Google_client();
	    $client->setClientId(self::GOOGLE_CLIENT_ID);
	    $client->setClientSecret(self::GOOGLE_CLIENT_SECRET);
	    $client->setRedirectUri(self::GOOGLE_REDIRECT_URL_REGISTER);
	    $client->addScope(self::GOOGLE_SCOPE_1);
	    $client->addScope(self::GOOGLE_SCOPE_2);

        $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $client->setHttpClient($guzzleClient);

        if(isset($_GET['code'])){
            $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
            $tokenAccess = $_GET['code'];
            $client->setAccessToken($token);

            $gauth = new Google_Service_Oauth2($client);
            $google_info = $gauth->userinfo->get();
            $email = $google_info->email;
            $name = $google_info->name;
            $passBeta = random_bytes(13);
            $pass = bin2hex($passBeta);
        
            $user = new User();
            $user->setPseudo($name);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setPass2($pass);

            $validator = new UserValidator();
            $errors = $validator->validateRegister($user);

            if ($errors) {
                $tokenBeta = random_bytes(4);
                $token = bin2hex($tokenBeta);
                $pass = password_hash($pass, PASSWORD_BCRYPT);
                //$pass2 = null;
                $user->setPass($pass);
                //$user->setPass2($pass2);
                $user->setDate(date('Y-m-d H:i:s'));
                $user->setStatut('0');
                $user->setRole(self::ROLE_VISITOR);
                $user->setNewsletter('0');
                $user->setToken($token);

                $userAction = new UserRepository();    
                $userAction->register($user);

                $mail = new Mail();
                $mail->sendEmailForRegister($user);
                $pass2 = null;              //envoi paremail du mdp creer supimer apres email
                $user->setPass2($pass2);
                header('location: http://blog/index.php?param=on');
                //$_SESSION['message']['class'] = "success";
                //$_SESSION['message']['content'] = "<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> &nbsp &nbsp felicitation votre enregistrement est bien pris en compte il vous restera a comfirmer votre e-mail. &nbsp &nbsp <a class=\"continuer\" href=index.php>Continuer...</a> &nbsp &nbsp <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
            } else {header('location: http://blog/index.php');}
            $msgErrorValidator = $validator->getMsgerror();
            //var_dump($errors);
            //var_dump($msgErrorValidator);
            //header('location: http://blog/index.php?param=on');
        }
    }

    public function confirmation() {

        $email = $this->getRequest()->getSetting('email');
        $token = $this->getRequest()->getSetting('token');
        
        $user = new User;
        $user->setToken($token);
        //$user->setEmail($email);//
        $userAction = new UserRepository();
        $comparDataUser = $userAction->getUser($user);

      
        $getPseudoDB = $comparDataUser['pseudo'];
        $getEmailDB = $comparDataUser['email'];
        //var_dump($comparDataUser);
       //die();
        if(empty($getPseudoDB) || $getEmailDB !== $email ){
           
            $_SESSION['message']['class'] = "denied";
            $_SESSION['message']['content'] = " <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>
              &nbsp &nbsp Vous n'avez pas ou plus l'autorisation d'acces a cette page. &nbsp <a class=\"deniedLink\" href=index.php>Continuer la navigation sur le site...</a>&nbsp &nbsp <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>";
          
            header('Location: home');
        } 
            $user->setRole(self::ROLE_MEMBER);
            $user->setStatut('1');
            $user->setEmail($email);
            $user->setToken($token);
            $userAction->updateRegister($user, self::PARAM_ON);
            header('Location: home');   
    }
}

