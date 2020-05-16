<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $path = '';
  $extension = '.class.php';

  if(strpos($url,'view') !== false){
    if(strpos(strtolower($className),'view') !== false){
      $path = '../view/';
    }else if (strrpos(strtolower($className),'control') !== false) {
      $path = '../control/';
    }else {
      $path = '../model/';
    }
  }else{
    if(strpos(strtolower($className),'view') !== false){
      $path = '../view/';
    }else if (strrpos(strtolower($className),'control') !== false) {
      $path = '../control/';
    }else {
      $path = '../model/';
    }
  }

  $fileName = $path.strtolower($className).$extension;

  include_once $fileName;
}

?>
