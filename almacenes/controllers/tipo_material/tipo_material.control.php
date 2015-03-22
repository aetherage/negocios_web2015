<?php
/* Material Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipo_material/tipo_materiales.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["tipo_tipo_materialTitle"] = "";
    $htmlDatos["tipo_tipo_materialMode"] = "";
    $htmlDatos["tipma_id"] = "";
    $htmlDatos["tipma_des"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipo_materialTitle"] = "Ingreso de Nuevo Tipo de Material";
          $htmlDatos["tipo_materialMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarTipoMaterial($_POST);
            if($lastID){
              redirectWithMessage("¡Material Ingresado!","index.php?page=tipo_material&acc=upd&tipma_id=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
    
              $htmlDatos["tipma_id"] = $_POST["tipma_id"];
              $htmlDatos["tipma_des"]=$_POST["tipma_des"];


            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipo_material", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarTipoMaterial($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Material Actualizado!","index.php?page=tipo_material&acc=upd&al_id=".$_POST["tipma_id"]);
            }
          }
          if(isset($_GET["tipma_id"])){
            $tipo_material = obtenerTipoMaterial($_GET["tipma_id"]);
            if($tipo_material){
              $htmlDatos["tipo_materialTitle"] = "Actualizar ".$tipo_material["tipma_des"];
              $htmlDatos["tipo_materialMode"] = "upd";
              $htmlDatos["tipma_id"] = $tipo_material["tipma_id"];
              $htmlDatos["tipma_des"]=$tipo_material["tipma_des"];
              
              renderizar("tipo_material", $htmlDatos);
            }else{
              redirectWithMessage("¡Material No Encontrado!","index.php?page=tipo_materiales");
            }
          }else{
            redirectWithMessage("¡Material No Encontrado!","index.php?page=tipo_materiales");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarTipoMaterial($_POST["tipma_id"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Material Borrada!","index.php?page=tipo_materiales");
          }
        }
          if(isset($_GET["tipma_id"])){
            $tipo_material = obtenerTipoMaterial($_GET["tipma_id"]);
            if($tipo_material){
              $htmlDatos["tipo_materialTitle"] = "¿Desea borrar ".$tipo_material["tipma_des"] . "?";
              $htmlDatos["tipo_materialMode"] = "dlt";
              $htmlDatos["tipma_id"]=$tipo_material["tipma_id"];
              $htmlDatos["tipma_des"]=$tipo_material["tipma_des"];
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("tipo_material", $htmlDatos);
            }else{
              redirectWithMessage("¡Material No Encontrada!","index.php?page=tipo_materiales");
            }
          }else{
            redirectWithMessage("¡Material No Encontrada!","index.php?page=tipo_materiales");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipo_materiales");
          break;
      }
    }
  }
  run();
?>
