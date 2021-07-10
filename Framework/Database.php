<?php

namespace App\Framework;

use App\Framework\Configuration;
use PDO;


abstract class Database

{
    private static $bdd;
    
    protected function executeRequest($sql, $params = null)
    {
        if ($params == null) {
            $result = self::getBdd()->query($sql);   
        }
        else {
            $result = self::getBdd()->prepare($sql); 
            $result->execute($params);
        }
        return $result;
    }

    private static function getBdd()
    {
        if (self::$bdd === null) {
            
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            
            self::$bdd = new PDO($dsn, $login, $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}