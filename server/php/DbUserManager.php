<?php

/**
 *
 */
class DbUserManager{

  private $con;

  function __construct(){
    require_once 'DbConnect.php';

    $db = new DbConnect();
    $this->con = $db->connect();
  }

  public function createUser($username,$email,$password){
    if(!$this->isUsernameExisted($username)){
      if (!$this->isEmailExisted($email)) {
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->con->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username,$email,$hashed_password);
        $stmt->execute();

        return array("error"=>"false","message"=>"Používateľ bol úspešne zaregistrovaný!");
      }
      else {
        return array("error"=>"true","message"=>"Email sa už používa!");
      }
    }
    else {
      return array("error"=>"true","message"=>"Používateľské meno sa už používa!");
    }
  }

  public function deleteUser(){
    // code...
  }

  public function getUser($email,$password){
    $stmt = $this->con->prepare("SELECT * FROM users WHERE email LIKE ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $user=$stmt->get_result()->fetch_assoc();

    if(password_verify($password,$user['password']))
      return $user;
    else
      return array('error' => true, 'message' => "Zlé heslo!" );

  }
  public function updateUser(){
    // code...
  }

  private function isEmailExisted($email){
    $stmt = $this->con->prepare("SELECT email FROM users WHERE email LIKE ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    return  $stmt->num_rows>0 ? true : false;
  }

  private function isUsernameExisted($username){
    $stmt = $this->con->prepare("SELECT username FROM users WHERE username LIKE ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    return  $stmt->num_rows>0 ? true : false;
  }

}
