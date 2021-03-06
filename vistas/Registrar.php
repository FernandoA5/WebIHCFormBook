<?php
  include_once "Plantillas/head.php";

  include_once "app/conexion.inc.php";
  include_once "app/repositorioUsuario.inc.php";
  include_once "app/usuario.inc.php";
  include_once "app/validadorR.inc.php";
  include_once "app/redireccion.inc.php";

  if (isset($_POST["send"]))
  {
    conexion:: openConnection();
    $validador = new ValidadorRegistro($_POST["nombre"], $_POST["email"], $_POST["pass1"], $_POST["pass2"], conexion::getConnection());
    if($validador ->registroValido())
    {
      $usuario = new Usuario("", $validador ->getName(), $validador ->getEmail(), password_hash($validador ->getPass(), PASSWORD_DEFAULT) , "", "");
      $usuarioInsertado = RepositorioUsuario :: insertarUsuario(conexion :: getConnection(), $usuario);
      if($usuarioInsertado)
      {
        redireccion::redirigir(REGISTROCORRECTO . "?nombre=". $usuario->obtenerNombre());
      }
    }
    conexion:: closeConnection();
  }
?>

<div class="container" style="padding-top:5px">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading centrado">
          <h3 class="panel-title">Registrar</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="<?php echo REGISTRAR; ?>">

              <?php
              if (isset($_POST["send"]))
              {
              include_once "Plantillas/registroValidado.inc.php";
              }
              else{
                include_once "Plantillas/registroVacio.inc.php";
              }
               ?>
          </form>
        <br>
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <a href="#">¿Ya tienes cuenta?</a>
              </div><br>
              <div class="text-center">
                <a href="#">¿Olvidaste tu contraseña?</a><br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php
  include_once "Plantillas/cierre.php";
 ?>
