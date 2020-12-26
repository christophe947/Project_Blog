<?php

namespace App\Framework;

class Request {

    private $setttings;

    public function __construct($settings) {
        $this->settings = $settings;
    }

    public function existSetting($name) {
        return (isset($this->settings[$name]) && $this->settings[$name] != "");
    }
  
    public function getSetting($name) {
        if ($this->existSetting($name)) {
            return $this->settings[$name];
        }
        else
            throw new Exception("Paramètre '$name' absent de la requête");
      }
}