<?php

  @include __DIR__.'/bootstrap.php';
  require_once DIR_APP.'/vendor/autoload.php';
  include __DIR__.'/inc/inc.codes.php';

  require_once 'classes/database/UserContr.php';
  require_once 'classes/util/ValidateArgs.php';
  
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

  $app = AppFactory::create();

  $app->addErrorMiddleware(true, true, false);

  $app->get('/api', function(Request $request, Response $response, array $args){
    $response->getBody()->write("Hello World");
    return $response;
  });


  $app->get('/api/user',function(Request $request, Response $response, array $args){

    $userCtr = new UserContr();
    $users = $userCtr->getAllUsers();

    $response->getBody()->write(json_encode($users));
    return $response->withStatus(200)->withHeader('Content-type', 'application/json');
  });


  $app->get('/api/user/{id}', function(Request $request, Response $response, array $args){

    if(ValidateArgs::validateId($args['id'])){
      try{
        $userCtr = new UserContr();
        $data = $userCtr->getUser($args['id']);
      }catch(Exception $e){
        $data = ERROR_GENERIC;
      }
    }else{
      $data = BAD_REQUEST;
    }
    

    $response->getBody()->write(json_encode($data['data']));
    return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');

  });


  $app->post('/api/user/create', function(Request $request, Response $response, array $args){
    $body = json_decode($request->getBody()->getContents(), true);
    
    if(ValidateArgs::validateUserBody($body)){
      try{
        $userCtr = new UserContr();
        $data = $userCtr->insertUser($body);
      }catch(Exception $e){
        $data = ERROR_GENERIC;
      }
    }else{
      $data = BAD_REQUEST;
    }

    $response->getBody()->write(json_encode($data['data']));
    return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');
  });


  $app->patch('/api/user/{id}/update', function(Request $request, Response $response, array $args){
    $body = json_decode($request->getBody()->getContents(), true);
    
    
    // if(ValidateArgs::validateUserBody($body)){
    //   try{
    //     $userCtr = new UserContr();
    //     $data = $userCtr->insertUser($body);
    //   }catch(Exception $e){
    //     $data = ERROR_GENERIC;
    //   }
    // }else{
    //   $data = BAD_REQUEST;
    // }

    // $response->getBody()->write(json_encode($data['data']));
    // return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');
  });

  try{
    @$app->run();
  }catch(Exception $e){
      
  }

?>