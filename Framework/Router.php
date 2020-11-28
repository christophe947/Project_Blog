<?php

namespace App\Framework;

use App\Framework\Request;
use App\Framework\View;


class Router
{

    public function routerRequest()
    {
        try {
            
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }

    private function createController(Request $request)
    {
        $controller = "Home";  
        if ($request->existSetting('controller')) {
            $controller = $request->getSetting('controller');
            
            $controller = ucfirst(strtolower($controller));
        }
        
        $classeController = 'App\Controller\\'.$controller;
        $fileController = "../Controller/" . $controller . ".php";
        
        
        
        if (file_exists($fileController)) {
            
            
            $controller = new $classeController();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            
            throw new \Exception("Fichier '$fileController' introuvable");
        }
    }

    private function createAction(Request $request)
    {
        $action = "index";  
        if ($request->existSetting('action')) {
            $action = $request->getSetting('action');
        }
        return $action;
    }

    private function manageError(Exception $exception)
    {
        $view = new \App\Framework\View('error');
        $view->generate(array('msgErreur' => $exception->getMessage()));
    }

}