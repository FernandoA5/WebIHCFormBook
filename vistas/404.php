<?php
include_once "Plantillas/head.php";
include_once "app/redireccion.inc.php";
if($partesRuta[1]=="User")
{
    redireccion::redirigir(SERVIDOR);
}
?>

<h1 class="centrado">404</h1>
<h2 class="centrado">Página no encontrada 😭</h2>
<h3 class="centrado"><a href=<?php echo SERVIDOR; ?>>volver a inicio</a></h3>



<?php
include_once "Plantillas/cierre.php"
?>