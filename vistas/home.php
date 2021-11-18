<?php
  include_once "Plantillas/head.php";
  include_once "app/conexion.inc.php";
  include_once "app/RepositorioFormulas.inc.php";
  conexion::openConnection();
  $conexion=conexion::getConnection();
  
  $temas=RepositorioFormula::obtenerTemas($conexion);
  conexion::closeConnection();
  ?>
  

  
  <div class="container">
    <div>
      <?php
        for($i=0; $i<sizeof($temas); $i++){
          if($i%4==0)
          {
            ?>
            </div>
            <div class="row">    
              <div class="col-sm-3" >
                  <div>
                          <a href="<?php echo SERVIDOR."/".$temas[$i] ?>" class="btn btn-primary">
                            <?php echo $temas[$i];?>
                          </a>
                  </div>
              </div>
            <?php
          }
          else{
            ?>
              <div class="col-sm-3">
                  <div>
                      <a href="<?php echo SERVIDOR."/".$temas[$i]; ?>" class="btn btn-primary">
                        <?php echo $temas[$i];?>
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
