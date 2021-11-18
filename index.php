<?php
include_once "app/config.inc.php";
include_once "app/RepositorioFormulas.inc.php";
include_once "app/conexion.inc.php";

$page = parse_url($_SERVER["REQUEST_URI"]);
$ruta=$page["path"];
$partesRuta=explode("/", $ruta);
$encontrada=0;
//echo $partesRuta[1];
if($partesRuta[1]=="")
{
  include_once "vistas/home.php";
  $encontrada=1;
}
if($partesRuta[1]=="Registrar")
{
  include_once "vistas/Registrar.php";
  $encontrada=1;
}
if($partesRuta[1]=="RegistroCorrecto")
{
  include_once "vistas/RegistroCorrecto.php";
  $encontrada=1;
}
if($partesRuta[1]=="Login")
{
  include_once "vistas/Login.php";
  $encontrada=1;
}
if($partesRuta[1]=="Logout")
{
  include_once "vistas/cerrarSesion.php";
  $encontrada=1;
}
if($partesRuta[1]=="recuperarClave")
{
  include_once "vistas/recuperarClave.php";
  $encontrada=1;
}
if($partesRuta[1]=="generarUrl")
{
  include_once "scripts/generarUrl.inc.php";
  $encontrada=1;
}
if($partesRuta[1]=="Buscar")
{
  include_once "vistas/Buscar.php";
  $encontrada=1;
}

conexion::openConnection();
$connection=conexion::getConnection();

if(RepositorioFormula::temaExiste($connection, $partesRuta[1]) && !isset($partesRuta[2]))
{
  
  include_once "vistas/tema.php";
  $encontrada=1;
}
if(!empty($partesRuta[2]))
{
  if(RepositorioFormula::subtemaExiste($connection, $partesRuta[2]) && !isset($partesRuta[3]))
  {
    include_once "vistas/subtema.php";
    $encontrada=1;
  }
  if(!empty($partesRuta[3]))
  {
    if(RepositorioFormula::formulaExiste($connection, $partesRuta[3]) && !isset($partesRuta[4]))
    {
      include_once "vistas/formula.php";
      $encontrada=1;
    }
  }
}

if($encontrada==0)
{
  include_once "vistas/404.php";
}

?>

