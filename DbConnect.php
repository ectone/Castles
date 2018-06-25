<?php
  /**
   *
   */
  class DbConnect{

    private $con;

    function __construct(){
    }

    public function connect(){
      $this->con = new mysqli("localhost","root","","dbcastles");
      if(mysqli_connect_errno()){
        echo "Nedá sa pripojiť k databáze". mysqli_connect_err();
      }
      $this->con->set_charset("utf8");
      return $this->con;
    }
  }
