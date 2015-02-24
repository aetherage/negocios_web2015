<?php
/*
CREATE TABLE `categorias` (
      `ctgid` BIGINT(8) NOT NULL AUTO_INCREMENT,
      `ctgdsc` VARCHAR(45) NULL,
      `ctgest` CHAR(3) NULL,
      PRIMARY KEY (`ctgid`));
 */
 $txtDsc = "";
 $cmbEst = "ACT";
 $last = "";
 $conn = new mysqli("127.0.0.1","root",
                    "root","nw201501");

 if($conn->errno){
   die($conn->error);
 }

 if(isset($_POST["btnSave"])){
   $txtDsc = $_POST["txtDsc"];
   $cmbEst = $_POST["cmbEst"];

   $insertSQL = "Insert into categorias (ctgdsc, ctgest) ";
   $insertSQL .= "value ('".$txtDsc."','".$cmbEst."');";

   $inserted = $conn->query($insertSQL);

   $last = $conn->insert_id;

 }

 $str = "SELECT * from categorias;";
 $cursor = $conn->query($str);
 $categorias = array();
 while($registro = $cursor->fetch_assoc()){
   //obtenga el registro de forma associativa
   /* $registro = array(
          "ctgid"=> 1,
          "ctgdsc"=> "Algun Valor",
          "ctgest"=> "ACT"
    );
    */
   $categorias[]=$registro;
 }
 
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="UTF-8">
                <title>" "</title>
        </head>
        <body>
            
        </body>
    </html>
    