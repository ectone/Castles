<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'DbUserManager.php';

$db_user = new DbUserManager();

$data = json_decode(file_get_contents("php://input"));

if($_SERVER['REQUEST_METHOD']=="POST"){
  echo json_encode($db_user->createUser($data->username, $data->email, $data->password), JSON_UNESCAPED_UNICODE);
}elseif ($_SERVER['REQUEST_METHOD']=="GET") {
  if($_GET["action"] == 'login'){
    echo json_encode($db_user->getUser($_GET["email"],$_GET["password"]), JSON_UNESCAPED_UNICODE);
    echo password_hash($_GET["password"],PASSWORD_DEFAULT);
  }
}
