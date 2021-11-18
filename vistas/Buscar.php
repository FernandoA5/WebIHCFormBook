<?php
include_once "Plantillas/head.php";

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form role="form" method="post" action="<?php echo SERVIDOR.BUSCAR; ?>">
            <?php 
            
                ?>
                    <div class="col-md-11">
                        <input type="text" name="busqueda" id="busqueda" placeholder="¿Qué estás buscando?" autofocus
                        value='<?php 
                        if(isset($_POST["buscar"]))
                            echo $_POST["busqueda"];
                        ?>' class="form-control">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="buscar" class="btn btn-sm form-control" style="color:white; background-color:#26A9FF">
                            <span class="glyphicon glyphicon-search" style="color:white"></span>
                        </button>
                    </div>
                <?php 
                include_once "app/escritor_formulas.inc.php";
            ?>
            </form>
        </div>
    </div>
</div>
<?php

include_once "Plantillas/cierre.php";
?>