<?php
/* Almacen Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipo_almacen/tipo_almacenes.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["tipo_tipo_almacenTitle"] = "";
    $htmlDatos["tipo_tipo_almacenMode"] = "";
    $htmlDatos["tipal_id"] = "";
    $htmlDatos["tipal_des"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipo_almacenTitle"] = "Ingreso de Nuevo Tipo de Almacen";
          $htmlDatos["tipo_almacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarTipoAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Almacen Ingresado!","index.php?page=tipo_almacen&acc=upd&tipal_id=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
    
              $htmlDatos["tipal_id"] = $_POST["tipal_id"];
              $htmlDatos["tipal_des"]=$_POST["tipal_des"];


            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipo_almacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarTipoAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Actualizado!","index.php?page=tipo_almacen&acc=upd&al_id=".$_POST["tipal_id"]);
            }
          }
          if(isset($_GET["tipal_id"])){
            $tipo_almacen = obtenerTipoAlmacen($_GET["tipal_id"]);
            if($tipo_almacen){
              $htmlDatos["tipo_almacenTitle"] = "Actualizar ".$tipo_almacen["tipal_des"];
              $htmlDatos["tipo_almacenMode"] = "upd";
              $htmlDatos["tipal_id"] = $tipo_almacen["tipal_id"];
              $htmlDatos["tipal_des"]=$tipo_almacen["tipal_des"];
              
              renderizar("tipo_almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen No Encontrado!","index.php?page=tipo_almacenes");
            }
          }else{
            redirectWithMessage("¡Almacen No Encontrado!","index.php?page=tipo_almacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarTipoAlmacen($_POST["tipal_id"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Almacen Borrada!","index.php?page=tipo_almacenes");
          }
        }
          if(isset($_GET["tipal_id"])){
            $tipo_almacen = obtenerTipoAlmacen($_GET["tipal_id"]);
            if($tipo_almacen){
              $htmlDatos["tipo_almacenTitle"] = "¿Desea borrar ".$tipo_almacen["tipal_des"] . "?";
              $htmlDatos["tipo_almacenMode"] = "dlt";
              $htmlDatos["tipal_id"]=$tipo_almacen["tipal_id"];
              $htmlDatos["tipal_des"]=$tipo_almacen["tipal_des"];
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("tipo_almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen No Encontrada!","index.php?page=tipo_almacenes");
            }
          }else{
            redirectWithMessage("¡Almacen No Encontrada!","index.php?page=tipo_almacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipo_almacenes");
          break;
      }
    }
  }
  run();
?>
