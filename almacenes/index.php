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
        //Mantenimiento de Almacenes
        case "almacenes":
            require_once("controllers/almacenes.control.php");
            break;
        case "almacen":
                require_once("controllers/almacen.control.php");
                break;
            
        //Mantenimiento de Empresas  
        case "empresa":
                require_once("controllers/empresa/empresa.control.php");
                break;
        case "empresas":
                require_once("controllers/empresa/empresas.control.php");
                break;
            
        //Mantenimiento de Tipos de Almacen
        case "tipo_almacen":
                require_once("controllers/tipo_almacen/tipo_almacen.control.php");
                break;         
        case "tipo_almacenes":
                require_once("controllers/tipo_almacen/tipo_almacenes.control.php");
                break;
            
          //Mantenimiento de TIpos de Materiales
        case "tipo_material":
                require_once("controllers/tipo_material/tipo_material.control.php");
                break;         
        case "tipo_materiales":
                require_once("controllers/tipo_material/tipo_materiales.control.php");
                break;
            
            //El Mainstream Default :/

        default:
            require_once("controllers/error.control.php");

    }


?>
