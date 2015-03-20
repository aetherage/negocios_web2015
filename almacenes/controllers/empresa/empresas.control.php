<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/empresa/empresas.model.php");

  function run(){
    $empresas = array();
    $empresas = obternerEmpresas();
    renderizar("empresas", array("empresas" => $empresas));
  }

  run();
?>
