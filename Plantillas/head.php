<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormBook</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTACSS ?>estilos.css">
    <link rel="stylesheet" href="<?php echo RUTACSS ?>bootstrap.min.css">
</head>
<body>
    <div class="barra">
        <a href="<?php echo SERVIDOR; ?>" class="titulo">
        FormBook
        <span class="glyphicon glyphicon-book" style="color:white"></span>
        </a><br>
        <?php
        include_once "app/controlSesion.inc.php";
        if(!controlSesion::sesionIniciada())
        {
                ?>
                <a href="<?php echo SERVIDOR.REGISTRAR; ?>"  class="session-buttons">
                <span class="glyphicon glyphicon-user" style="color:white"></span>
                        Registar &nbsp
                </a>
                <a href="<?php echo SERVIDOR.LOGIN; ?>" class="session-buttons">
                    <span class="glyphicon glyphicon-log-in" style="color:white"></span>
                    Iniciar Sesión &nbsp
                </a>
                <?php
        }
        else{

            ?>
            <a href="<?php echo SERVIDOR.LOGOUT; ?>" class="session-buttons">
            <span class="glyphicon glyphicon-log-out" style="color:white"></span>
            Cerrar Sesión
            </a>  
            <?php

        }
        ?>
    </div>
    <div class="path">
        <?php
            $page = parse_url($_SERVER["REQUEST_URI"]);
            $ruta=$page["path"];
            $partesRuta=explode("/", $ruta);
            
            conexion::getConnection();
            include_once "app/palabrasRaras.inc.php";
            if($partesRuta[1]!="")
            {
                $path=SERVIDOR;
                ?>
                <a href="<?php echo $path ?>"> <?php echo "Inicio"; ?> </a>
                <?php
                $path.="/".palabrasRaras::arreglar($partesRuta[1]);
                if(isset($partesRuta[2]))
                {
                    //$path.="/".palabrasRaras::arreglar($partesRuta[2]);
                    ?>
                    <a href="<?php echo $path; ?>">/ <?php echo palabrasRaras::arreglar($partesRuta[1]); ?></a>
                    <?php
                    $path.="/".$partesRuta[2];
                    if(isset($partesRuta[3]))
                    {
                        ?>
                            <a href="<?php echo $path; ?>">/ <?php echo $partesRuta[2]; ?></a>
                        <?php
                    }
                }
                //echo palabrasRaras::arreglar($partesRuta[1]);
            }
        ?>
    </div>