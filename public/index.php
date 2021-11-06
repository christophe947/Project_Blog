<?php
//ini_set('session.cookie_domain', substr($_SERVER['SERVER_NAME'], strpos($_SERVER['SERVER_NAME'], "."), 100));
//ini_set("session.cookie_domain","http://blog/index.php");
//ini_set("session.cookie_path","c:/wamp64/tmp");
//session_save_path("c:/wamp64/tmp");
//session_name('sessionPrincipale');
session_start();

require '../Autoloader.php'; 
\App\Autoloader::register();

use App\Framework\Router;

$router = new Router();
$router->routerRequest();