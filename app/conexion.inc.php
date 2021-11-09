<?php
class conexion
{
  private static $conection;
  public static function openConnection()
  {
    include_once "config.inc.php";
    try {
      if(!isset($conection))
      {
        self::$conection =new PDO("mysql:host=" . NameServer . ";dbname=" . DBName, NameUser, Password);

        self::$conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conection->exec("SET CHARACTER SET utf8");
      }
    } catch (PDOException $ex) {
      print (HOLIERROR . $ex -> getMessage() . "<br>");
    }

  }
  public static function closeConnection()
  {
    if(isset(self::$conection))
    {
      self::$conection=null;
    }
  }
  public static function getConnection()
  {
    return self::$conection;
  }
}

 ?>
