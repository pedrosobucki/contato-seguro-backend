<?php
/**
 * AUTOLOAD DE CLASSES PARA O PACOTE 'Classes'
 * @param $classe
 */
  function autoload($class){

    $baseDir = __DIR__ . DS;
    $class = $baseDir . 'classes' . DS . str_replace('\\', DS, $class) . '.php';

    var_dump($class);

    if (file_exists($class) && !is_dir($class)) {
        include $class;
    }
  }

  spl_autoload_register('autoload');

?>