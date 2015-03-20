<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/site.mw.php");
    require_once("controllers/verificar.mw.php");

    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;
        //Mantenimiento de Unidades
        case "almacenes":
            require_once("controllers/almacenes.control.php");
            break;
        case "almacen":
                require_once("controllers/almacen.control.php");
                break;
        case "empresa":
                require_once("controllers/empresa/empresa.control.php");
                break;
        case "empresas":
                require_once("controllers/empresa/empresas.control.php");
                break;

        default:
            require_once("controllers/error.control.php");

    }


?>
