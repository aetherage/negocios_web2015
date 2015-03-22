<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/empresa/empresas.model.php");

  function run()
  {
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["empresaTitle"] = "";
    $htmlDatos["empresaMode"] = "";
    $htmlDatos["emp_id"] = "";
    $htmlDatos["emp_des"]="";
    $htmlDatos["emp_rtn"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"]))
    {
       switch($_GET["acc"])
      {
          //Manejando si es un insert
          case "ins":
            $htmlDatos["empresaTitle"] = "Ingreso de Nuevo Empresa";
            $htmlDatos["empresaMode"] = "ins";
            //se determina si es una acción del formulario
            if(isset($_POST["btnacc"]))
        {
              $lastID = insertarEmpresa($_POST);
              if($lastID)
          {
            redirectWithMessage("¡Empresa Ingresado!","index.php?page=empresa&acc=upd&emp_id=".$lastID);
          }
              else
            {
                //Se obtiene los datos que estaban en el post
                $htmlDatos["emp_id"] = $_POST["emp_id"];
                $htmlDatos["emp_des"]=$_POST["emp_des"];
                $htmlDatos["emp_rtn"]=$_POST["emp_rtn"];
            }
            //si no es una acción del post se muestra los datos
            renderizar("empresa", $htmlDatos);
        }
            break;
          
          
          //Manejando si es un Update
          case "upd":
            if(isset($_POST["btnacc"]))
        {
              //implementar logica de guardado
              if(actualizarEmpresa($_POST))
          {
                //forzando a que se actualice con los datos de la db
                redirectWithMessage("¡Empresa Actualizado!","index.php?page=empresa&acc=upd&emp_id=".$_POST["emp_id"]);
          }
        }
            if(isset($_GET["emp_id"]))
          {
              $empresa = obtenerEmpresa($_GET["emp_id"]);
              if($empresa)
            {
                $htmlDatos["empresaTitle"] = "Actualizar ".$empresa["emp_des"];
                $htmlDatos["empresaMode"] = "upd";
                $htmlDatos["emp_id"] = $empresa["emp_id"];
                $htmlDatos["emp_des"]=$empresa["emp_des"];
                $htmlDatos["emp_rtn"]=$empresa["emp_rtn"];
               
                renderizar("empresa", $htmlDatos);
            }else
            {
                redirectWithMessage("¡Empresa No Encontrado!","index.php?page=empresas");
            }
          }else
            {
              redirectWithMessage("¡Empresa No Encontrado!","index.php?page=empresas");
            }
            break;
          //Manejando un delete
          case "dlt":
          if(isset($_POST["btnacc"]))
          {
            //implementar logica de guardado
            if(borrarEmpresa($_POST["emp_id"]))
            {
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Empresa Borrada!","index.php?page=empresas");
            }
          }
            if(isset($_GET["emp_id"]))
            {
              $empresa = obtenerEmpresa($_GET["emp_id"]);
              if($empresa)
              {
                $htmlDatos["empresaTitle"] = "¿Desea borrar ".$empresa["emp_des"] . "?";
                $htmlDatos["empresaMode"] = "dlt";
                $htmlDatos["emp_id"]=$empresa["emp_id"];
                $htmlDatos["emp_des"]=$empresa["emp_des"];
                $htmlDatos["emp_rtn"]=$empresa["emp_rtn"];
                $htmlDatos["disabled"]='disabled="disabled"';
                renderizar("empresa", $htmlDatos);
              }else
              {
                redirectWithMessage("¡Empresa No Encontrada!","index.php?page=empresas");
              }
            }else
            {
              redirectWithMessage("¡Empresa No Encontrada!","index.php?page=empresas");
            }
            break;
          
          default:
            redirectWithMessage("¡Acción no permitida!","index.php?page=empresas");
            break;
      }
    }
  }
  run();
?>
