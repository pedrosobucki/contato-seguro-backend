<?php

  const ALLOWED_USER_PARAMS = ["name", "email", "telephone", "birth_date", "birth_city"];

  class ValidateArgs{

    public static function validateId($id){

      if(isset($id) && gettype($id) === 'integer' || isset($id) && gettype($id) === 'string' && intval($id) !== 0){
        $isValid = true;
      }else{
        $isValid = false;
      }

      return $isValid;

    }

    public static function validateUserBody($body, $obligatoryParams = null){

      if(array_intersect($obligatoryParams, array_keys($body)) || $obligatoryParams === null){

        foreach($body as $key => $value){
          if(!in_array($key, ALLOWED_USER_PARAMS)) return false;
        }

        $isValid = true;
      }else{
        $isValid = false;
      }

      return $isValid;

    }

  }

?>