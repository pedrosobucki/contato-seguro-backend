<?php

  class ValidateArgs{

    public static function validateId($id){

      if(isset($id) && gettype($id) === 'integer' || isset($id) && gettype($id) === 'string' && intval($id) !== 0){
        $isValid = true;
      }else{
        $isValid = false;
      }

      return $isValid;

    }

  }

?>