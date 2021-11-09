<?php
include_once "Plantillas/head.php";
include_once "app/conexion.inc.php";
include_once "app/RepositorioFormulas.inc.php";

$page = parse_url($_SERVER["REQUEST_URI"]);
$ruta=$page["path"];
$partesRuta=explode("/", $ruta);

conexion::getConnection();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="info">
                        <h3>Fórmula:</h3>
                        <img src="<?php
                            echo RUTAIMAGENES."/".$partesRuta[3].".png";
                        
                        ?>" alt="<?php echo $partesRuta[3]; ?>" width="100%">
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-12">
                <div class="info">
                <h3>Despejes:</h3>
                    <img src="<?php
                        echo RUTAIMAGENES."/desp-".$partesRuta[3].".png";
                    ?>" alt="<?php echo RUTAIMAGENES."/desp-".$partesRuta[3].".png"; ?>" height="100%">
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8">
            <div class="info">
                <h3>Descripción:</h3>
                <img src="<?php
                    echo RUTAIMAGENES."/exp-".$partesRuta[3].".png";
                ?>" alt="<?php echo RUTAIMAGENES."/exp-".$partesRuta[3].".png"; ?>">
            </div>
            <br>
            <div class="info">
                <h3>Ejemplo:</h3>
                <img src="<?php
                    echo RUTAIMAGENES."/inst-".$partesRuta[3].".png";
                ?>" alt="<?php echo RUTAIMAGENES."/inst-".$partesRuta[3].".png"; ?>" width:100%>
            </div>
            <br>
            <div class="video">
                
            </div>
        </div>
    </div>
</div>

<?php
include_once "Plantillas/cierre.php";
?>
