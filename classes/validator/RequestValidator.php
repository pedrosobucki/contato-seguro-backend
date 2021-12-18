<?php

  namespace validator;

  use Util\CodeConstants;

  class RequestValidator{

    private $request;
    private $requestData;

    const GET = 'GET';
    const DELETE = 'DELETE';

    public function __construct($request){
      $this->request = $request;
    }

    public function processRequest(){

      $response = utf8_encode(CodeConstants::MSG_ERROR_TYPE_ROUTE);

      $this->request['method'] == 'POST';

      if(in_array($this->request['method'], CodeConstants::TYPE_REQUEST){
        $response = $this->forward();
      }

      return $response;
    }

    private function forward(){
      if($this->request['method'] != self::GET && $this->request['method'] != self::DELETE){
        $this->requestData = JsonUtil::treatRequestBody(); 
      }
    }

  }

?>