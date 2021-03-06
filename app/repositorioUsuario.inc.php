<?php
include_once "usuario.inc.php";
class RepositorioUsuario
{
  public static function getAll($conection)
  {
    $usuarios=array();
    if(isset($conection))
    {
      try {
        $sql ="SELECT * FROM usuarios";
        $sentencia = $conection ->prepare($sql);
        $sentencia ->execute();
        $resultado=$sentencia ->fetchAll();
        if(count($resultado))
        {
          foreach($resultado as $fila)
          {
            $usuarios[]= new Usuario($fila["id"], $fila["nombre"], $fila["email"], $fila["password"], $fila["fechaRegistro"], $fila["activo"]);
          }
        }
        else
        {
          echo HOLI . " NO HAY USUARIOS";
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }

    }
    return $usuarios;
  }
  public static function getUsers($conection)
  {
    $TotUsers=null;
    try {
      if(isset($conection))
      {
        $sql="SELECT COUNT(*) total FROM usuarios";
        $sentencia=$conection ->prepare($sql);
        $sentencia ->execute();
        $resultado=$sentencia->fetch();
        $TotUsers=$resultado["total"];
      }
    } catch (PDOException $ex) {
      print HOLIERROR . $ex ->getMessage();
    }
    return $TotUsers;

  }
  public static function insertarUsuario($conection, $usuario)
  {
    $usuarioInsertado=false;
    if(isset($conection))
    {
      try {
        include_once "usuario.inc.php";
        $sql ="INSERT INTO usuarios(nombre, email, password, fechaRegistro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";
        $sentencia =$conection ->prepare($sql);

        $nombreTemp =$usuario ->obtenerNombre();
        $emailTemp=$usuario ->obtenerEmail();
        $passTemp=$usuario->obtenerPassword();

        $sentencia ->bindParam(":nombre", $nombreTemp, PDO:: PARAM_STR);
        $sentencia ->bindParam(":email", $emailTemp, PDO:: PARAM_STR);
        $sentencia ->bindParam(":password", $passTemp, PDO:: PARAM_STR);
        $usuarioInsertado = $sentencia ->execute();

      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
      return $usuarioInsertado;

    }
  }
  public static function nombreExiste($conection, $nombre)
  {
    $nombreExiste=true;
    if(isset($conection))
    {
      try {
        include_once "usuario.inc.php";
        $sql="SELECT * FROM usuarios WHERE nombre = :nombre";
        $sentencia =$conection ->prepare($sql);

        $sentencia ->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $sentencia ->execute();
        $resultado =$sentencia ->fetchAll();
        if(count($resultado))
        {
          $nombreExiste=true;
        }
        else {
          $nombreExiste=false;
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
      return $nombreExiste;
    }
  }
  public static function emailExiste($conection, $email)
  {
    $emailExiste=true;
    if(isset($conection))
    {
      try {
      $sql="SELECT * FROM usuarios WHERE email = :email";
      $sentencia =$conection ->prepare($sql);

      $sentencia ->bindParam(":email", $email, PDO::PARAM_STR);
      $sentencia ->execute();
      $resultado= $sentencia ->fetchAll();
      if(count($resultado))
      {
        $emailExiste=true;
      }
      else{
        $emailExiste=false;
      }

      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
      return $emailExiste;
    }
  }
  public static function obtenerUsuarioPorEmail($conection, $email)
  {
    $usuario=null;
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM usuarios WHERE email= :email";
        $sentencia=$conection ->prepare($sql);

        $sentencia->bindParam(":email", $email, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();

        if(!empty($resultado))
        {
          $usuario = new Usuario($resultado["id"], $resultado["nombre"], $resultado["email"], $resultado["password"], $resultado["fechaRegistro"], $resultado["activo"]);
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
    }
    return $usuario;
  }
  public static function obtenerUsuarioPorNombre($conection, $nombre)
  {
    $usuario=null;
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM usuarios WHERE nombre= :nombre";
        $sentencia=$conection ->prepare($sql);

        $sentencia->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if(!empty($resultado))
        {
          $usuario = new Usuario($resultado["id"], $resultado["nombre"], $resultado["email"], $resultado["password"], $resultado["fechaRegistro"], $resultado["activo"]);
        }
        else {
          echo HOLIERROR . "RESULTADO VACIO";
        }

      } catch (PDOException $ex) {
        print HOLIERROR . $ex->getMessage();
      }

    }
    return $usuario;
  }
  public static function obtenerUsuarioPorId($conection, $id)
  {
    $usuario=null;
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM usuarios WHERE id=:id";
        $sentencia=$conection->prepare($sql);
        $sentencia->bindParam(":id", $id, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if(!empty($resultado))
        {
          $usuario = new Usuario($resultado["id"], $resultado["nombre"], $resultado["email"], $resultado["password"], $resultado["fechaRegistro"], $resultado["activo"]);
        }
        else {
          echo HOLIERROR . "RESULTADO VACIO";
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex->getMessage();
      }

    }
    return $usuario;

  }
  public static function cambiarClave($conection, $usuario, $nuevaClave)
  {
    $cambiar=false;
    if(isset($conection))
    {
      $sql="UPDATE usuarios SET password = :password WHERE id=:id";
      $sentencia=$conection->prepare($sql);
      //BINDPARAM
      $idTemp=$usuario->obtenerId();
      $sentencia->bindParam(":password", $nuevaClave, PDO::PARAM_STR);
      $sentencia->bindParam(":id", $idTemp, PDO::PARAM_STR);
      //EJECUCI??N DE LA SENTENCIA EN BASE DE DATOS
      if($sentencia->execute())
      {
        $cambiar=true;
      }
    }
    return $cambiar;
  }
  public static function activarCuenta($conection, $idUsuario)
  {
    $activada=null;
    if(isset($conection)) 
    {
      try{
        $sql="UPDATE usuarios SET activo = :activo WHERE id=:id";
        $sentencia=$conection->prepare($sql);
        $activo=1;
        $sentencia->bindParam(":id", $idUsuario, PDO::PARAM_STR);
        $sentencia->bindParam(":activo", $activo, PDO::PARAM_STR);
        if($sentencia->execute())
        {
          $activada=true;
        }
      }catch(PDOException $ex)
      {
        print HOLIERROR.$ex->getMessage();
      }
    }
    return $activada;
  }
 
}


 ?>
