<?php

namespace App\Framework;

use App\Configuration;

class View
{
    
    private $file;
   
    private $title;

    public function __construct($action, $controller = "")
    {
        
        $file = "../View/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    public function generate($data)
    {
       
        $content = $this->generateFile($this->file, $data);
        
        $racineWeb = \App\Framework\Configuration::get("racineWeb", "/");
     
        $view = $this->generateFile('../View/template.php',
                array('title' => $this->title, 'content' => $content, 'racineWeb' => $racineWeb));
        
        echo $view;
    }

    private function generateFile($file, $data)
    {
        if (file_exists($file)) {
            
            extract($data);
            
            ob_start();
            
            require $file;
          
            return ob_get_clean();
        }
        else {
            throw new \Exception("Fichier '$file' introuvable");
        }
    }

    private function clean($value)
    {
        
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }

}