<?php

  @include __DIR__.'/bootstrap.php';
  require_once DIR_APP.'/vendor/autoload.php';
  include __DIR__.'/inc/inc.codes.php';

  require_once 'classes/database/UserContr.php';
  require_once 'classes/database/CompanyContr.php';
  require_once 'classes/database/AdressContr.php';
  require_once 'classes/util/ValidateArgs.php';
  
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

  $app = AppFactory::create();

  //$app->addErrorMiddleware(true, true, false);
  
  unset($app->getContainer()['errorHandler']);
  unset($app->getContainer()['phpErrorHandler']);

  $app->add(function ($request, $handler) {
      $response = $handler->handle($request);
      return $response
              ->withHeader('Access-Control-Allow-Origin', '*')
              ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
              ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
  });

  $app->options('/{routes:.+}', function ($request, $response, $args) {
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
    
    if(ValidateArgs::validateBody('user', $body, ["name", "email"])){

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
    
    if(ValidateArgs::validateId($args['id']) && ValidateArgs::validateBody('user', $body)){
      try{
        $userCtr = new UserContr();
        $data = $userCtr->updateUser($args['id'], $body);
      }catch(Exception $e){
        $data = ERROR_GENERIC;
      }
    }else{
      $data = BAD_REQUEST;
    }

    $response->getBody()->write(json_encode($data['data']));
    return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');
  });


  $app->delete('/api/user/{id}/delete', function(Request $request, Response $response, array $args){
    
    if(ValidateArgs::validateId($args['id'])){
      try{
        $userCtr = new UserContr();
        $data = $userCtr->deleteUser($args['id']);
      }catch(Exception $e){
        $data = ERROR_GENERIC;
      }
    }else{
      $data = BAD_REQUEST;
    }

    $response->getBody()->write(json_encode($data['data']));
    return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');
  });


  $app->get('/api/company',function(Request $request, Response $response, array $args){

    $companyCtr = new CompanyContr();
    $companies = $companyCtr->getAllCompanies();

    $response->getBody()->write(json_encode($companies));
    return $response->withStatus(200)->withHeader('Content-type', 'application/json');
  });
  

  $app->get('/api/company/{id}', function(Request $request, Response $response, array $args){

    if(ValidateArgs::validateId($args['id'])){
      try{
        $companyCtr = new CompanyContr();
        $data = $companyCtr->getCompany($args['id']);
      }catch(Exception $e){
        $data = ERROR_GENERIC;
      }
    }else{
      $data = BAD_REQUEST;
    }

    $response->getBody()->write(json_encode($data['data']));
    return $response->withStatus($data['status'])->withHeader('Content-type', 'application/json');

  });

  $app->post('/api/company/create', function(Request $request, Response $response, array $args){
    $body = json_decode($request->getBody()->getContents(), true);
    
    if(ValidateArgs::validateBody('company', $body, ["name", "cnpj", "cep", "country", "state", "city", "street", "number", "district"])){
      echo 'data valid!';
      die;

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

  

  try{
    @$app->run();
  }catch(Exception $e){
      
  }

?>