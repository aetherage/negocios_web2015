<?php

    require_once("libs/dao.php");

    function obternerTipoAlmacenes(){
        $tipo_almacenes = array();
        $sqlstr = "select * from tipo_almacenes;";
        $tipo_almacenes = obtenerRegistros($sqlstr);
        return $tipo_almacenes;
    }
    function obtenerTipoAlmacen($tipo_almacenID){
      $tipo_almacen = array();
      $sqlstr = "select * from tipo_almacenes where `tipal_id` = %d;";
      $sqlstr = sprintf($sqlstr, $tipo_almacenID);
      $tipo_almacen = obtenerUnRegistro($sqlstr);
      return $tipo_almacen;
    }
       
    function insertarTipoAlmacen($tipo_almacen){
      if($tipo_almacen && is_array($tipo_almacen)){
         $sqlInsert = "INSERT INTO `tipo_almacenes` (`tipal_des`)
                        VALUES('%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($tipo_almacen["tipal_des"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTipoAlmacen($tipo_almacen){
      if($tipo_almacen && is_array($tipo_almacen)){
        $sqlUpdate = "update tipo_almacenes set tipal_des=s%";
        $sqlUpdate = sprintf($sqlUpdate,
                        valstr($tipo_almacen["tipal_des"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
    function borrarTipoAlmacen($tipo_almacenID){
      if($tipo_almacenID){
        $sqlDelete = "delete from tipo_almacenes where tipal_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($tipo_almacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
