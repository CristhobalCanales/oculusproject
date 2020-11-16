<?php

namespace models;

class Conexion
{
  //public static $user = "root";
  //public static $pass = "";
  //public static $URL = "mysql:host=localhost;dbname=optica_2020";

  public static $user = "uyz9yif3w44m9p94";
  public static $pass = "EFw7kdT8yTtY9G0shhnk";
  public static $URL = "mysql:host=bs68i6rxzigvxvgi5quy-mysql.services.clever-cloud.com;dbname=bs68i6rxzigvxvgi5quy";

  public static function conector()
  {
    try {
      return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
    } catch (\PDOException $e) {
      return null;
    }
  }
}
