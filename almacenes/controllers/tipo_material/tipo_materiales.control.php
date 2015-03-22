<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipo_material/tipo_materiales.model.php");

  function run(){
    $tipo_materiales = array();
    $tipo_materiales = obternerTipoMateriales();
    renderizar("tipo_materiales", array("tipo_materiales" => $tipo_materiales));
  }

  run();
?>
