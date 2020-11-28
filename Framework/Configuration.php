<?php

namespace App\Framework;

class Configuration {

  private static $settings;

 
  public static function get($name, $defaultValue = null) {
    if (isset(self::getSettings()[$name])) {
      $value = self::getSettings()[$name];
    }
    else {
      $value = $defaultValue;
    }
    return $value;
  }

  private static function getSettings() {
    if (self::$settings == null) {
      $filePath = "../Config/prod.ini";
      if (!file_exists($filePath)) {
        $filePath = "../Config/dev.ini";
      }
      if (!file_exists($filePath)) {
        throw new Exception("Aucun fichier de configuration trouvé");
      }
      else {
        self::$settings = parse_ini_file($filePath);
      }
    }
    return self::$settings;
  }
}