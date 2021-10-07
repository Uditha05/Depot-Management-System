<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $path = '';
  $extension = '.class.php';

  if(strpos($url,'view') !== false){
    if(strpos($className,'Factory') !== false){
      $path = '../control/';
    }else if(strpos($className,'View') !== false){ /*not needed*/
      $className = substr($className,0,-4).".view";
      $path = '../view/';
    }else if (strrpos($className,'Control') !== false) {
      $path = '../control/';
      $className = substr($className,0,-7).".control";
    }else if(strpos($className,'DTO') !== false){
      $path = '../includes/';
    }else if(strpos($className,'DAO') !== false){
      $path = '../model/';
      if ((strpos($className,'Super') !== false) or (strpos($className,'Crud') !== false)) {
        $extension = '.inf.php';
      }
    }else {
      $path = '../control/';  /*not needed*/
    }
  }else{
    if(strpos($className,'Factory') !== false){
      $path = '../control/';
    }else if(strpos($className,'View') !== false){  /*not needed*/
      $className = substr($className,0,-4).".view";
      $path = '../view/';
    }else if (strrpos($className,'Control') !== false) {
      $className = substr($className,0,-7).".control";
      $path = '../control/';
    }else if(strpos($className,'DTO') !== false){
      $path = '../includes/';
    }else if(strpos($className,'DAO') !== false){
      $path = '../model/';
      if ((strpos($className,'Super') !== false) or (strpos($className,'Crud') !== false)) {
        $extension = '.inf.php';
      }
    }else {
      $path = '../model/';  /*not needed*/
    }
  }

  $fileName = $path.$className.$extension;

  include_once  $fileName;
}

?>
