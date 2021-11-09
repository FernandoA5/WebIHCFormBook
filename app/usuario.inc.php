<?php
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;
    
    public function __construct($id, $nombre, $email, $password, $fecha_registro, $activo)
    {
      $this -> id=$id;
      $this -> nombre=$nombre;
      $this -> email=$email;
      $this -> password=$password;
      $this -> fecha_registro=$fecha_registro;
      $this -> activo=$activo;
    }
    public function obtenerId()
    {
      return $this -> id;
    }
    public function obtenerNombre()
    {
      return $this -> nombre;
    }
    public function obtenerPassword()
    {
      return $this -> password;
    }
    public function obtenerEmail()
    {
      return $this -> email;
    }
    public function obtenerFechaRegistro()
    {
      return $this -> fecha_registro;
    }
    public function obtenerActivo()
    {
      return $this -> activo;
    }
    public function changeNombre($nombre)
    {
      $this -> nombre =$nombre;
    }
    public function changePassword($password)
    {
      $this -> password =$password;
    }
    public function changeEmail($email)
    {
      $this -> email =$email;
    }
    public function changeActivo($activo)
    {
      $this -> activo =$activo;
    }

}


 ?>
