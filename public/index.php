<?php


require '../Autoloader.php'; 
\App\Autoloader::register();

use App\Framework\Router;

$router = new Router();
$router->routerRequest();