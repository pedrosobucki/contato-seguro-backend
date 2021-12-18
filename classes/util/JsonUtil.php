<?php

  use util\CodeConstants;
  
  class JsonUtil{

    public static function treatRequestBody(){

      try{
        $postJson = json_decode(file_get_contents('php://input'), true);
      }catch(JsonException $e){
        throw new InvalidArgumentException(CodeConstants::MSG_ERR0R_EMPTY_JSON);
      }

    }

  }

?>