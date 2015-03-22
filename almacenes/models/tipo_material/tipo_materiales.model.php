<?php

    require_once("libs/dao.php");

    function obternerTipoMateriales(){
        $tipo_materiales = array();
        $sqlstr = "select * from tipo_materiales;";
        $tipo_materiales = obtenerRegistros($sqlstr);
        return $tipo_materiales;
    }
    function obtenerTipoMaterial($tipo_materialID){
      $tipo_material = array();
      $sqlstr = "select * from tipo_materiales where `tipma_id` = %d;";
      $sqlstr = sprintf($sqlstr, $tipo_materialID);
      $tipo_material = obtenerUnRegistro($sqlstr);
      return $tipo_material;
    }
       
    function insertarTipoMaterial($tipo_material){
      if($tipo_material && is_array($tipo_material)){
         $sqlInsert = "INSERT INTO `tipo_materiales` (`tipma_des`)
                        VALUES('%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($tipo_material["tipma_des"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTipoMaterial($tipo_material){
      if($tipo_material && is_array($tipo_material)){
        $sqlUpdate = "update tipo_materiales set tipma_des=s%";
        $sqlUpdate = sprintf($sqlUpdate,
                        valstr($tipo_material["tipma_des"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
    function borrarTipoMaterial($tipo_materialID){
      if($tipo_materialID){
        $sqlDelete = "delete from tipo_materiales where tipma_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($tipo_materialID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
