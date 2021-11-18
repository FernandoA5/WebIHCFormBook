<?php
//SERVIDOR
define("NameServer", "localhost");
define("NameUser", "root");
define("Password", "");
define("DBName", "fdb");

//RUTAS
define("SERVIDOR", "http://localhost");
define("REGISTRAR", "/Registrar");
define("REGISTROCORRECTO", "/RegistroCorrecto");
define("LOGIN", "/Login");
define("LOGOUT", "/Logout");
define("BUSCAR", "/Buscar");

//SOURCES
define("RUTACSS", SERVIDOR . "/css/");
define("RUTAJS", SERVIDOR . "/js/");
define("RUTAIMAGENES", SERVIDOR . "/img/");
define("RUTAPLANTILLAS", SERVIDOR .  "/Plantillas/");
define("RUTAAPP", SERVIDOR . "/app/");
define("RECUPERARCLAVE", SERVIDOR."/RecuperarClave");
//define("DIRECTORIORAIZ", realpath(dirname(_FILE_)."/..")); php5
define("DIRECTORIORAIZ", realpath(__DIR__."/..")); //php7

define("HOLI", "HOLI: ❤️");
define("HOLIERROR", "HOLI, QUE MAL PLAN: ");
