<?php 

namespace App\Repository;

use App\Framework\Database;
use App\Controller\Home;
use App\Controller\Admin;
use App\Model\User;


class UserRepository extends Database {
         
    public function register($user) {
        $sql = 'insert into user(pseudo, password, email, status, created_at, role, newsletter, token) values(:pseudo, :mdp, :email, :statut, :date, :role, :newsletter, :token)';
        $this->executeRequest($sql, array(
            'pseudo' => $user->getPseudo(),
            'mdp' => $user->getPass(),
            'email' => $user->getEmail(),
            'statut' => $user->getStatut(),
            'date' => $user->getDate(),
            'role' => $user->getRole(),
            'newsletter' => $user->getNewsletter(),
            'token' => $user->getToken()
        ));
    } 

    public function isUseInBddPseudoEmail($value) {
        $sql = "SELECT pseudo || email FROM user WHERE pseudo = :pseudo || email = :email";
        $result = $this->executeRequest($sql, array(
            'pseudo' => $value,
            'email' => $value
       ));
        $dataUser = $result->fetch(); 
        return $dataUser;
    }

    public function isUseInBddPseudoEmailUpdate($value, $value1) {
        $sql = "SELECT pseudo || email FROM user WHERE (pseudo = :pseudo AND pseudo != :actualData) || (email = :email AND email != :actualData)";
        $result = $this->executeRequest($sql, array(
            'pseudo' => $value,
            'email' => $value,
            'actualData' => $value1
       ));
        $dataUser = $result->fetch(); 
        return $dataUser;
    }

    public function updateRegister($user, $value = null) {
        if($value != null ) { $sql = 'UPDATE user SET status = :status, role = :role, token = null WHERE email = :email AND token = :getToken'; } else {
            $sql = 'UPDATE user SET status = :status, role = :role, token = :token WHERE email = :email2 /*AND token = :getToken*/'; }
            if ($value != null) {
        $this->executeRequest($sql, array(
            'status' => $user->getStatut(),
            'role' => $user->getRole(),
            'email' => $user->getEmail(),
           // 'email2' => $_SESSION['auth']['email'],
            'getToken' => $user->getToken()
        ));
        } else {
            $this->executeRequest($sql, array(
                'status' => $user->getStatut(),
                'role' => $user->getRole(),
                'token' => $user->getToken(),
                //'email' => $user->getEmail(),
                'email2' => $_SESSION['auth']['email']
                //'getToken' => $user->getToken()
            ));
        }
    }

    public function updateProfil($user, $value = null) { //avce valeur pas  de modif pass
        if($value != null ) { $sql = 'UPDATE user SET pseudo = :pseudo, email = :email/*, password = :pass */ WHERE email = :emailProfil'; } else {
        $sql = 'UPDATE user SET pseudo = :pseudo, email = :email, password = :pass  WHERE email = :emailProfil'; }
        if ($value != null) {
            $this->executeRequest($sql, array(
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
           // 'pass' => $user->getPass3(), 
            'emailProfil' => $_SESSION['auth']['email']   
        ));
        } else {
            $this->executeRequest($sql, array(
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'pass' => $user->getPass3(), 
                'emailProfil' => $_SESSION['auth']['email']   
            ));
        }
    }
     public function updateProfilByAdmin($user) {
        $sql = "UPDATE user SET role = :role WHERE (email = :email) /*AND role <> 30*/";
        $result = $this->executeRequest($sql, array(
            'role' => $user->getRole(),
            'email' => $user->getEmail()
            
        ));
     }

    public function deleteMember($user) {
        $sql = "DELETE FROM user WHERE (email = :email) AND role <> 30";  //empeche suppression de ladmin
        $result = $this->executeRequest($sql, array(
            'email' => $user->getEmail()
            
        ));
    }

    public function getUser($user) {
        $sql = "SELECT id, pseudo, email, status, created_at,  role, newsletter, token FROM user WHERE (email =:getEmail) || (token =:getToken) ";
        $result = $this->executeRequest($sql, array(
            'getEmail' => $user->getEmail(),
            'getToken' => $user->getToken()
        ));
        $dataUser = $result->fetch(); 
        //var_dump($dataUser);
        //die();
            return $dataUser;
        }

    public function getMembers() {
        $sql = "SELECT pseudo, email, status, created_at,  role, newsletter, token FROM user /*WHERE role <> 30*/ ORDER BY created_at DESC"; //naffiche pas ladmin
        $result = $this->executeRequest($sql, array(        
        ));
        $dataMembers = $result->fetchAll(); 
            return $dataMembers;
        }

    public function checkForConnect2($user, $value = null) {

        if($value != null ) { $sql = 'SELECT email FROM user WHERE (email = :email)'; } else {
        $sql = "SELECT email, password FROM user WHERE (email = :email)"; };
        
        $result = $this->executeRequest($sql, array(
            'email' => $user->getEmail()
        ));
        $dataUser = $result->fetch(); 
        return $dataUser;
    }  
    
    public function checkForUpdate($user) {
        $sql = "SELECT email, password FROM user WHERE (email = :email)";
        $result = $this->executeRequest($sql, array(
            'email' => $_SESSION['auth']['email']
            /*'pass' => $user->getPass()*/
        ));
        $dataUser = $result->fetch(); 
        return $dataUser;
        /*($dataUser);
        die();*/
    }  
    
    


}