<?php

    require_once("libs/dao.php");

    function obtenerAlmacenes(){
        $almacenes = array();
        $sqlstr = "select * from almacenes;";
        $almacenes = obtenerRegistros($sqlstr);
        return $almacenes;
    }

    /*function obtenerSuperAlmacenes(){
        // Esta funcion encuentra todos los SUPER Almacenes que hay en MYSQL
        $supeAlmacenes = array();
        $sqlstr = "SELECT al_des FROM almacenes.almacenes where al_sup_al = 0;";
        $supeAlmacenes = obtenerRegistros($sqlstr);
        return $supeAlmacenes;
    }
    
    function obtenerSubAlmacenes($almacenID){
        // Esta funcion cuenta todos los Almacenes que estan contenidos en un SuperAlmacen.
        $subAlmacenes = array();
        $sqlstr = "select count(*) from almacenes.almacenes where al_sup_al =".$almacenID.";";
        $subAlmacenes = obtenerRegistros($sqlstr);
        return $subAlmacenes;
        
    }
    */
    function obtenerAlmacen($almacenID){
      $almacen = array();
      $sqlstr = "select * from almacenes where al_id = %d;";
      $sqlstr = sprintf($sqlstr, $almacenID);
      $almacen = obtenerUnRegistro($sqlstr);
      return $almacen;
    }

    function obtenerAlmacenesTipoSelected($almacenTipo = 'SICUB'){
      $tipos = array(
        array("al_tip_id" => "SICUB" , "al_tip_des" => "Cubierto", "selected"=>""),
        array("al_tip_id" => "NOCUB" , "al_tip_des" => "Descubierto", "selected"=>""),
      );

      for($i=0; $i<count($tipos); $i++){
        $tipos[$i]["selected"] = ($tipos[$i]["al_tip_id"] == $almacenTipo)?"selected":"";
      }
      return $tipos;
    }
    
    
    function insertarAlmacen($almacen){
      if($almacen && is_array($almacen)){
         $sqlInsert = "INSERT INTO `almacenes` (`al_des`, `al_sup_al`, `al_tip`, `al_tel`, `al_tel2`, `al_mate`, `al_dir`, `al_emp_id`)
                        VALUES('%s','%d','%s','%d','%d','%s','%s','%d');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($almacen["al_des"]),
                        valstr($almacen["al_sup_al"]),
                        valstr($almacen["al_tip"]),
                        valstr($almacen["al_tel"]),
                        valstr($almacen["al_tel2"]),
                        valstr($almacen["al_mate"]),
                        valstr($almacen["al_dir"]),
                        valstr($almacen["al_emp_id"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarAlmacen($almacen){
      if($almacen && is_array($almacen)){
        $sqlUpdate = "update almacenes set `al_des`='%s', `al_sup_al`='%d', `al_tip`='%s', `al_tel`='%d', `al_tel2`='%d', `al_mate`='%s', `al_dir`='%s',`al_emp_id`='d%' where `al_id`='%d';";
        $sqlUpdate = sprintf($sqlUpdate,
                        valstr($almacen["al_des"]),
                        valstr($almacen["al_sup_al"]),
                        valstr($almacen["al_tip"]),
                        valstr($almacen["al_tel"]),
                        valstr($almacen["al_tel2"]),
                        valstr($almacen["al_mate"]),
                        valstr($almacen["al_dir"]),
                        valstr($almacen["al_emp_id"]),
                        valstr($almacen["al_id"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarAlmacen($almacenID){
      if($almacenID){
        $sqlDelete = "delete from almacenes where al_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($almacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
