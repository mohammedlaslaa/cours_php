<?php

class Singleton {

  private static $_instance = null;

  private function __construct($var) { 
      echo $var; 
  }

  public function getMessage (){
    echo "Ceci est un message test !";
  }

  public static function getInstance($text) {

    if(is_null(self::$_instance)) {
      self::$_instance = new self($text);  
    }

    return self::$_instance;
  }
}

$x = Singleton::getInstance("Text");

$u->getMessage();