<?php

namespace App\Model;

use App\Framework\Database;
use App\Controller\Home;


class User extends Database {

    private $id;
    private $pseudo;
    private $pass;
    private $pass2;
    private $email;
    private $statut;
    private $date;
    private $role;
    private $newsletter;
    private $token;
    
   
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getPseudo() {
        return $this->pseudo;
    }
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    public function getPass() {
        return $this->pass;
    }
    public function setPass($pass) {
        $this->pass = $pass;
    }
    public function getPass2() {
        return $this->pass2;
    }
    public function setPass2($pass2) {
        $this->pass2 = $pass2;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getStatut() {
        return $this->statut;
    }
    public function setStatut($statut) {
        $this->statut = $statut;
    }
    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function getRole() {
        return $this->role;
    }
    public function setRole($role) {
        $this->role = $role;
    }
    public function getNewsletter() {
        return $this->newsletter;
    }
    public function setNewsletter($newletter) {
        $this->newsletter = $newletter;
    }
    public function getToken() {
        return $this->token;
    }
    public function setToken($token) {
        $this->token = $token;
    }

}




/*          RECUP PARAM URL

        $url = $_SERVER['REQUEST_URI'];
        $getParam = parse_url($url);
        $parameter = $getParam['query'];
        parse_str($parameter, $output);
        $getEmail = $output['email'];
        $getToken = $output['token'];
  
        echo "<script>alert(\"Felicitation vous etes bien inscrit\")</script>";                              
*/