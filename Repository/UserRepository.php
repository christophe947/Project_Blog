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
        $dataUser = $result->fetchAll(); // fetchAll
        return $dataUser;
    }


    public function getUser($user) {
        $sql = "SELECT pseudo, email, status, created_at,  role, newsletter, token FROM user WHERE (email =:getEmail) || (token =:getToken) ";
        $result = $this->executeRequest($sql, array(
            'getEmail' => $user->getEmail(),
            'getToken' => $user->getToken()
        ));
        $dataUser = $result->fetch(); 
            return $dataUser;
        }

}