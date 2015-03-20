<?php

    require_once("libs/dao.php");

    function obternerEmpresas(){
        $empresaes = array();
        $sqlstr = "select * from empresas;";
        $empresaes = obtenerRegistros($sqlstr);
        return $empresaes;
    }
    function obtenerEmpresa($empresaID){
      $empresa = array();
      $sqlstr = "select * from empresas where emp_id = %d;";
      $sqlstr = sprintf($sqlstr, $empresaID);
      $empresa = obtenerUnRegistro($sqlstr);
      return $empresa;
    }
       
    function insertarEmpresa($empresa){
      if($empresa && is_array($empresa)){
         $sqlInsert = "INSERT INTO `empresas` (`emp_des`, `emp_rtn`)
                        VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($empresa["emp_des"]),
                        valstr($empresa["emp_rtn"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarEmpresa($empresa){
      if($empresa && is_array($empresa)){
        $sqlUpdate = "update empresas set emp_des=s%, emp_rtn=s%";
        $sqlUpdate = sprintf($sqlUpdate,
                        valstr($empresa["emp_des"]),
                        valstr($empresa["emp_rtn"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
    function borrarEmpresa($empresaID){
      if($empresaID){
        $sqlDelete = "delete from empresas where emp_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($empresaID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
