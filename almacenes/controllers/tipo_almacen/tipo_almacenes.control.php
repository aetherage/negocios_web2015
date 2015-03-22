<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipo_almacen/tipo_almacenes.model.php");

  function run(){
    $tipo_almacenes = array();
    $tipo_almacenes = obternerTipoAlmacenes();
    renderizar("tipo_almacenes", array("tipo_almacenes" => $tipo_almacenes));
  }

  run();
?>
