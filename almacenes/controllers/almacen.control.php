<?php
/* Almacen Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/almacenes.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["almacenTitle"] = "";
    $htmlDatos["almacenMode"] = "";
    $htmlDatos["al_id"] = "";
    $htmlDatos["al_des"]="";
    $htmlDatos["al_sup_al"]="";
   // $htmlDatos["al_sub_al"]=obtenerSubAlmacenes();
    $htmlDatos["al_tip"]="";
      $htmlDatos["sicubSelected"]="selected";
      $htmlDatos["nocubSelected"]="";
    $htmlDatos["al_dir"] = "";
    $htmlDatos["al_tel"] = "";
    $htmlDatos["al_tel2"]="";
    $htmlDatos["al_mate"]="";
    $htmlDatos["disabled"]="";
      // $htmlDatos["desSelected"]="";
      // $htmlDatos["desSelected"]="";
      // $htmlDatos["desSelected"]="";
      // $htmlDatos["desSelected"]="";
      // Aqui van los tipos de material que se pueden almacenar.
      
    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["almacenTitle"] = "Ingreso de Nuevo Almacen";
          $htmlDatos["almacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Almacen Ingresado!","index.php?page=almacen&acc=upd&al_id=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
    
              $htmlDatos["al_id"] = $_POST["al_id"];
              $htmlDatos["al_des"]=$_POST["al_des"];
              $htmlDatos["al_sup_al"]=$_POST["al_sup_al"];
              $htmlDatos["al_tip"]=$_POST["al_tip"];
                $htmlDatos["sicubSelected"]=($_POST["al_tip"] =="SICUB")?"selected":"";
                $htmlDatos["nocubSelected"]=($_POST["al_tip"] =="NOCUB")?"selected":"";
              $htmlDatos["al_dir"]=$_POST["al_dir"];
              $htmlDatos["al_tel"]=$_POST["al_tel"];
              $htmlDatos["al_tel2"]=$_POST["al_tel2"];
              $htmlDatos["al_mate"]=$_POST["al_mate"];
                //$htmlDatos["sicubSelected"]=($_POST["al_mate"] =="SICUB")?"selected":"";
                //$htmlDatos["nocubSelected"]=($_POST["al_mate"] =="NOCUB")?"selected":"";
                //$htmlDatos["nocubSelected"]=($_POST["al_mate"] =="NOCUB")?"selected":"";
                //$htmlDatos["nocubSelected"]=($_POST["al_mate"] =="NOCUB")?"selected":"";

            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("almacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Actualizado!","index.php?page=almacen&acc=upd&al_id=".$_POST["al_id"]);
            }
          }
          if(isset($_GET["al_id"])){
            $almacen = obtenerAlmacen($_GET["al_id"]);
            if($almacen){
              $htmlDatos["almacenTitle"] = "Actualizar ".$almacen["al_des"];
              $htmlDatos["almacenMode"] = "upd";
              $htmlDatos["al_id"] = $almacen["al_id"];
              $htmlDatos["al_des"]=$almacen["al_des"];
              $htmlDatos["al_sup_al"]=$almacen["al_sup_al"];
              $htmlDatos["al_tip"]=$almacen["al_tip"];
                $htmlDatos["sicubSelected"]=($almacen["al_tip"] =="SICUB")?"selected":"";
                $htmlDatos["nocubSelected"]=($almacen["al_tip"] =="NOCUB")?"selected":"";
              $htmlDatos["al_dir"]=$almacen["al_dir"];
              $htmlDatos["al_tel"]=$almacen["al_tel"];
              $htmlDatos["al_tel2"]=$almacen["al_tel2"];
              $htmlDatos["al_mate"]=$almacen["al_mate"];
              // $htmlDatos["sicubSelected"]=($almacen["al_tip"] =="SICUB")?"selected":"";
              // $htmlDatos["sicubSelected"]=($almacen["al_tip"] =="SICUB")?"selected":"";
              // $htmlDatos["sicubSelected"]=($almacen["al_tip"] =="SICUB")?"selected":"";
              // $htmlDatos["nocubSelected"]=($almacen["al_tip"] =="NOCUB")?"selected":"";

              renderizar("almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
            }
          }else{
            redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarAlmacen($_POST["al_id"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Almacen Borrada!","index.php?page=almacenes");
          }
        }
          if(isset($_GET["al_id"])){
            $almacen = obtenerAlmacen($_GET["al_id"]);
            if($almacen){
              $htmlDatos["almacenTitle"] = "¿Desea borrar ".$almacen["al_des"] . "?";
              $htmlDatos["almacenMode"] = "dlt";
              $htmlDatos["al_id"] = $almacen["al_id"];
              $htmlDatos["al_des"]=$almacen["al_des"];
              $htmlDatos["al_sup_al"]=$almacen["al_sup_al"];
              $htmlDatos["al_tip"]=$almacen["al_tip"];
                $htmlDatos["sicubSelected"]=($almacen["al_tip"] =="SICUB")?"selected":"";
                $htmlDatos["nocubSelected"]=($almacen["al_tip"] =="NOCUB")?"selected":"";
              $htmlDatos["al_dir"]=$almacen["al_dir"];
              $htmlDatos["al_tel"]=$almacen["al_tel"];
              $htmlDatos["al_tel2"]=$almacen["al_tel2"];
              $htmlDatos["al_mate"]=$almacen["al_mate"];
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen No Encontrada!","index.php?page=almacenes");
            }
          }else{
            redirectWithMessage("¡Almacen No Encontrada!","index.php?page=almacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=almacenes");
          break;
      }
    }
  }
  run();
?>
