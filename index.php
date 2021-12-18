<?php

  @include __DIR__.'/bootstrap.php';
  require_once DIR_APP.'/vendor/autoload.php';

  require_once 'classes/database/UserContr.php';
  
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

  $app = AppFactory::create();

  $app->addErrorMiddleware(true, true, false);

  $app->get('/api', function(Request $request, Response $response, array $args){
    $response->getBody()->write("Hello World");
    return $response;
  });

  $app->get('/api/users',function(Request $request, Response $response, array $args){
    // $users = [
    //   array("id" => 1, "name" => "user1"),
    //   array("id" => 2, "name" => "user2"),
    //   array("id" => 3, "name" => "user3"),
    // ];

    $userCtr = new UserContr();
    $users = $userCtr->getAllUsers();

    $response->getBody()->write(json_encode($users));
    return $response->withStatus(200)->withHeader('Content-type', 'application/json');
  });

  $app->get('/api/users/{id}', function(Request $request, Response $response, array $args){
    $users = [
      array("id" => 1, "name" => "user1"),
      array("id" => 2, "name" => "user2"),
      array("id" => 3, "name" => "user3"),
    ];

    $user = $users[$args['id']];

    $response->getBody()->write(json_encode($user));
    return $response->withHeader('Content-type', 'application/json');

  });

  try{
    $app->run();
  }catch(Exception $e){
      
  }

?>