<?php

if($_SERVER['HTTP_HOST'] === 'localhost'){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting('E_ERROR');
}

  define(DS, DIRECTORY_SEPARATOR);
  define(DIR_APP, 'contato_seguro');

  if(file_exists('autoload.php')){
    include('autoload.php');
  }else{
    echo 'Bootstrap loading error: '.error_get_last();
  }
?>