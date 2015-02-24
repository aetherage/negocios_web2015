<?php
/*
CREATE TABLE `proveedores` (
  `prvid` BIGINT(8) NOT NULL AUTO_INCREMENT,
  `prvdsc` VARCHAR(45) NOT NULL,
  `prvemail` VARCHAR(120) NULL,
  `prvtel` VARCHAR(20) NULL,
  `prvcont` VARCHAR(60) NULL,
  `prvdir` VARCHAR(120) NULL,
  `prvest` CHAR(3) NULL,
  PRIMARY KEY (`prvid`));
  */
  
$txtprvdsc = "";
$txtprvemail = "";
$txtprvtel = "";
$txtprvcont = "";
$txtprvdir = "";
$txtprvest = "";


$conn = new mysqli("127.0.0.1","root",
                    "root","");
 if($conn->errno){
   die($conn->error);
   
   
if(isset($_POST["btnSave"])){
   $txtprvdsc = $_POST["txtprvdsc"];
   $txtprvemail = $_POST["txtprvemail"];
   $txtprvtel = $_POST["txtprvtel"];
   $txtprvcont = $_POST["txtprvcont"];
   $txtprvdir = $_POST["txtprvdir"];
   $txtprvest = $_POST["txtprvest"];

   $insertSQL = "Insert into categorias (txtprvdsc, txtprvemail, txtprvtel, txtprvcont, txtprvdir, txtprvest) ";
   $insertSQL .= "value ('".$txtprvdsc."','".$txtprvemail."','".$txtprvtel."','".$txtprvcont."','".$txtprvdir."','".$txtprvest."');";
   $inserted = $conn->query($insertSQL);
   
   $last = $conn->insert_id;}
   
   
   $str = "SELECT * from proveedores;";
 $cursor = $conn->query($str);
 $categorias = array();

  
  
  
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
    