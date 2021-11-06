<?php

namespace App\Framework;

use App\Framework\Configuration;
use App\Framework\Request;
//require '../vendor/autoload.php';

abstract class Controller
{
    private $action;

    protected $request;

    private $session;

    public function __construct() {
        $this->session = $_SESSION;
    }

    // créer les méthodes get set 

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeController = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeController");
        }
    }

    public abstract function index();

    protected function generateView($dataView = array(), $action = null, $admin = null)
    {
        $actionView = $this->action;
        if ($action != null) {
            $actionView = $action;
        }
        $classeController = get_class($this);
        $controllerNamespace = substr($classeController, 0, strrpos($classeController, '\\'));
        $controllerView = substr(str_replace($controllerNamespace, "", $classeController), 1);

        $view = new View($actionView, $controllerView);
        //gestion de la conditoin pour faire une autre  $view->generateBIS($dataView);
        if(!empty($_SESSION['auth']['role']) == 30) {
            $view->generateAdmin($dataView);   
        } else {
            $view->generate($dataView);
        }
    }

    protected function redirect($controller, $action = null)
    {
        $racineWeb = Configuration::get("racineWeb", "/");
        
        header("Location:" . $racineWeb . $controller . "/" . $action);
    }
}