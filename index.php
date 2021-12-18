<?php

    include('bootstrap.php');
    echo 'index.php';

    $userCtr = new UserContr();
    print_r($userCtr->getUser(1));

?>