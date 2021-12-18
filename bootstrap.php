<?php

if($_SERVER['HTTP_HOST'] === 'localhost'){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting('E_ERROR');
}

  const DS = DIRECTORY_SEPARATOR;
  const DIR_APP = __DIR__;
  const DIR_PROJECT = 'contato_seguro';

  if(file_exists('autoload.php')){
    include('autoload.php');
    include DIR_PROJECT . DS . 'vendor/autoload.php';
  }else{
    echo 'Bootstrap loading error: '.error_get_last();
  }
?>