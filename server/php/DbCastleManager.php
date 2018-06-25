<?php

/**
 *
 */
class DbCastleManager{

  private $con;

  function __construct(){
    require_once 'DbConnect.php';

    $db = new DbConnect();
    $this->con = $db->connect();
  }
  public function getAllCastles(){
    $stmt = $this->con->prepare("SELECT * FROM castles");
    $stmt->execute();
    $stmt->bind_result($id, $name, $lon, $lat);
    $castles = array();

    while($stmt->fetch()){
      $castle  = array();
      $castle['id'] = $id;
      $castle['name'] = $name;
      $castle['lon'] = $lon;
      $castle['lat'] = $lat;

      array_push($castles, $castle);
    }
     return $castles;
 }

  public function getCastleById($id){
    $stmt = $this->con->prepare("SELECT * FROM castles WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();


  }
  public function getCastleByName($name){
    $stmt = $this->con->prepare("SELECT * FROM castles WHERE name LIKE ?");
    $stmt->bind_param("s",$name);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();

  }

  public function getClosestCastle($user_lon, $user_lat){
    $stmt = $this->con->prepare("SELECT * FROM castles");
    $stmt->execute();
    $stmt->bind_result($id, $name, $lon, $lat);
    $castles = array();

    while($stmt->fetch()){
      $castle  = array();
      $castle['id'] = $id;
      $castle['name'] = $name;
      $castle['lon'] = $lon;
      $castle['lat'] = $lat;

      //výpočet vzdialenosti

      $distance = sqrt((($lat-$user_lat)**2)+(($lon-$user_lon)**2));
      $castle['distance']=$distance;

      array_push($castles, $castle);
    }
     return $castles;
  }
}
