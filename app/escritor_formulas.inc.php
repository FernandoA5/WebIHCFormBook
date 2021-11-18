<?php
include_once "RepositorioFormulas.inc.php";
include_once "conexion.inc.php";
conexion::openConnection();
$formulas = RepositorioFormula::obtenerTodo(conexion::getConnection());
$found=false;
?>
<div id="escritor" style="padding-top:50px; padding-bottom:50px;">
    <?php
    if (isset($_POST["buscar"])) {
        for ($i = 0; $i < sizeof($formulas); $i++) {
            //BUSCAR NOMBRES  
            $word = explode(" ", $formulas[$i]->obtenerNombre());
            for ($j = 0; $j < sizeof($word); $j++) {
                if (strcasecmp($_POST["busqueda"], $word[$j]) == 0) {
                $found=true;
                ?>
                    <div class="row" style="padding-top:10px;">
                        <div class="col-md-12" style="background-color:#26A9FF;">
                            <?php
                            $ruta = SERVIDOR . "/" . $formulas[$i]->obtenerTema();
                            $ruta .= "/" . $formulas[$i]->obtenerSubtema();
                            $ruta .= "/" . $formulas[$i]->obtenerNombre();
                            ?>
                            <a href="<?php echo $ruta ?>" class="escritor_formulas" title="<?php echo $formulas[$i]->obtenerTema() . " || " . $formulas[$i]->obtenerSubtema() . " || " . $formulas[$i]->obtenerTags() ?>">
                                <h3 class="text-center" style="padding:15px"><?php
                                                                                echo $formulas[$i]->obtenerTags();
                                                                                ?></h3>
                            </a>
                        </div>
                    </div>
                <?php
                }
            }
            //BUSCAR TAGS
            if(strcasecmp($formulas[$i]->obtenerTags(), $formulas[$i]->obtenerNombre())!=0)
            {
                $tags= explode(" ", $formulas[$i]->obtenerTags());
                for ($j = 0; $j < sizeof($tags); $j++) {
                    if (strcasecmp($_POST["busqueda"], $tags[$j]) == 0) {
                    $found=true;
                    ?>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-12" style="background-color:#26A9FF;">
                                <?php
                                $ruta = SERVIDOR . "/" . $formulas[$i]->obtenerTema();
                                $ruta .= "/" . $formulas[$i]->obtenerSubtema();
                                $ruta .= "/" . $formulas[$i]->obtenerNombre();
                                ?>
                                <a href="<?php echo $ruta ?>" class="escritor_formulas" title="<?php echo $formulas[$i]->obtenerTema() . " || " . $formulas[$i]->obtenerSubtema() . " || " . $formulas[$i]->obtenerTags() ?>">
                                    <h3 class="text-center" style="padding:15px"><?php
                                                                                    echo $formulas[$i]->obtenerTags();
                                                                                    ?></h3>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                }
            }

        }
        if($found==false)
        {
            ?>
                <h3 class="text-center">No hay ninguna formula llamada: <?php echo $_POST["busqueda"] ?></h3>
            <?php
        }
    } else {
        for ($i = 0; $i < sizeof($formulas); $i++) {
            ?>
            <div class="row" style="padding-top:10px;">
                <div class="col-md-12" style="background-color:#26A9FF;">
                    <?php
                    $ruta = SERVIDOR . "/" . $formulas[$i]->obtenerTema();
                    $ruta .= "/" . $formulas[$i]->obtenerSubtema();
                    $ruta .= "/" . $formulas[$i]->obtenerNombre();
                    ?>
                    <a href="<?php echo $ruta ?>" class="escritor_formulas" title="<?php echo $formulas[$i]->obtenerTema() . " || " . $formulas[$i]->obtenerSubtema() . " || " . $formulas[$i]->obtenerTags() ?>">
                        <h3 class="text-center" style="padding:15px"><?php
                                                                        echo $formulas[$i]->obtenerTags();
                                                                        ?></h3>
                    </a>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>