<?php

    require_once("libs/dao.php");

    function obternerTipoAlmacen(){
        $tipoalmacenes = array();
        $sqlstr = "select * from tipo_almacen;";
        $tipoalmacenes = obtenerRegistros($sqlstr);
        return $tipoalmacenes;
    }
    function obtenerTipoAlmacen($tipoalmacenID){
      $tipoalmacen = array();
      $sqlstr = "select * from tipo_almacenes where `tipal_id` = %d;";
      $sqlstr = sprintf($sqlstr, $tipoalmacenID);
      $tipoalmacen = obtenerUnRegistro($sqlstr);
      return $tipoalmacen;
    }
       
    function insertarTipoAlmacen($tipoalmacen){
      if($tipoalmacen && is_array($tipoalmacen)){
         $sqlInsert = "INSERT INTO `tipo_almacenes` (`emp_des`, `emp_rtn`)
                        VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($tipoalmacen["emp_des"]),
                        valstr($tipoalmacen["emp_rtn"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTipoAlmacen($tipoalmacen){
      if($tipoalmacen && is_array($tipoalmacen)){
        $sqlUpdate = "update tipo_almacenes set emp_des=s%, emp_rtn=s%";
        $sqlUpdate = sprintf($sqlUpdate,
                        valstr($tipoalmacen["emp_des"]),
                        valstr($tipoalmacen["emp_rtn"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
    function borrarTipoAlmacen($tipoalmacenID){
      if($tipoalmacenID){
        $sqlDelete = "delete from tipo_almacenes where tipal_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($tipoalmacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
