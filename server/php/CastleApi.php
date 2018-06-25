<?php

require 'DbCastleManager.php';

$castle_api = new DbCastleManager();
$response = array();

if($_GET["action"] == 'getAllCastles'){
  echo json_encode($castle_api->getAllCastles(), JSON_UNESCAPED_UNICODE);
}
elseif ($_GET["action"]=='getCastleById') {
  echo json_encode($castle_api->getCastleById($_GET['id']), JSON_UNESCAPED_UNICODE);
}
elseif ($_GET["action"]=='getCastleByName') {
  echo json_encode($castle_api->getCastleByName($_GET['name']), JSON_UNESCAPED_UNICODE);
}
elseif ($_GET["action"]=='getClosestCastle') {
  echo json_encode($castle_api->getClosestCastle($_GET['lon'],$_GET['lat']), JSON_UNESCAPED_UNICODE);
}
else {
  echo json_encode(array("error"=>"true","message"=>"Bad request!"), JSON_UNESCAPED_UNICODE);
}
