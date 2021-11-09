<?php
  include_once "Plantillas/head.php";
  include_once "app/conexion.inc.php";
  include_once "app/RepositorioFormulas.inc.php";

  $page = parse_url($_SERVER["REQUEST_URI"]);
  $ruta=$page["path"];
  $partesRuta=explode("/", $ruta);

  conexion::openConnection();
  $conexion=conexion::getConnection();
  
  $subtema=$partesRuta[2];

  $formulas=RepositorioFormula::obtenerPorSubtemas($conexion, $subtema);
  
  conexion::closeConnection();
  ?>
  
  
  <div class="container">
  <div>
      <?php
        for($i=0; $i<sizeof($formulas); $i++){
            $tema=$formulas[$i]->obtenerTema();
            $nombre=$formulas[$i]->obtenerNombre();
            if($i%4==0)
            {
            ?>
            </div>
            <div class="row">    
                <div class="col-md-3" >
                    <div>
                            <a href="<?php echo SERVIDOR."/".$tema."/".$subtema."/".$nombre; ?>" class="btn btn-primary" title="<?php echo $formulas[$i]->obtenerTags(); ?>">
                                <?php echo RepositorioFormula::resumirTitulo($formulas[$i]->obtenerNombre()); ?>      
                            </a>
                    </div>
                </div>
            <?php
            }
            else{
            ?>
                <div class="col-md-3">
                    <div>
                        <a href="<?php echo SERVIDOR."/".$tema."/".$subtema."/".$nombre; ?>" class="btn btn-primary" title="<?php echo $formulas[$i]->obtenerTags(); ?>">
                        <?php echo RepositorioFormula::resumirTitulo($formulas[$i]->obtenerNombre()); ?>      
                        </a>
                    </div>
                </div>
            <?php
            }
    }
      ?>
  </div>
  <?php
  include_once "Plantillas/cierre.php";
?>