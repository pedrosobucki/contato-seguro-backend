<?php

  const NO_CONTENT = array("data" => array("message" => "requested data not found!"), "status" => 404);
  const UPDATE_FAILED = array("data" => array("message" => "unable to update data!"), "status" => 404);
  const BAD_REQUEST = array("data" => array("message" => "invalid data!"), "status" => 400);

  const ERROR_GENERIC = array("data" => array("message" => "an error occured during request execution!"), "status" => 500);

?>