<?php

    use Validator\RequestValidator;
    use util\RoutesUtil;

    include('bootstrap.php');
    echo 'index.php';

    try{
        $validator = new RequestValidator(RoutesUtil::getRoutes());
        $response = $validator->processRequest($request);

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>