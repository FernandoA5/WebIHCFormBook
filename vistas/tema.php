<?php
include_once "Plantillas/head.php";
include_once "app/conexion.inc.php";

$page = parse_url($_SERVER["REQUEST_URI"]);
$ruta=$page["path"];
$partesRuta=explode("/", $ruta);

?>
<div class="container">
    <div class="row">
        <div class="col-sm-3 centrado panel-tema">
            <h4>
                <?php
                    $tema=palabrasRaras::arreglar($partesRuta[1]);
                    echo $tema;
                ?>
            </h4>
            <h5>
                <?php
                    conexion::openConnection();
                    $connection=conexion::getConnection();
                    $formulas=RepositorioFormula::obtenerPorTemas($connection, $tema);
                    $subtemas=RepositorioFormula::obtenerSubtemas($formulas);
                    conexion::closeConnection();
                    for($i=0; $i<sizeof($subtemas); $i++){
                        ?>
                            <h5><a href="<?php echo SERVIDOR."/".$tema."/".$subtemas[$i]; ?>"class="subtemas">
                            <?php echo $subtemas[$i]; ?>
                            </a></h5>
                        <?php
                    }
                    
                ?>
            </h5>
        </div>
        <div class="col-sm-1">

        </div>
        <div class="col-sm-8 panel-tema">
                    <h3 class="centrado" style="padding-top:30px">Descripción</h3>
                    <br>
                    <h4 style="padding-left:40px; padding-right: 40px; padding-bottom:40px">
                        <?php
                            echo $formulas[0]->obtenerDescripcion();
                        ?>
                    </h4>
        </div>
    </div>
</div>


<?php
include_once "Plantillas/cierre.php";
?>