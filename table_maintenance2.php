<?php
/*

CREATE TABLE `productos` (
    `prdid` BIGINT(8) NOT NULL AUTO_INCREMENT,
    `prddsc` VARCHAR(60) NULL,
    `prdbrc` VARCHAR(45) NULL,
    `prdctd` INT NULL,
    `prdest` CHAR(3) NULL,
    `ctgid` BIGINT(8) NULL,
    PRIMARY KEY (`prdid`));
 */
$txtdsc = "";
$txtbrc = "";
$intctd = 0;
$txtest = "";
$intid = 0;

$conn = new mysqli("127.0.0.1","root",
                    "root","");
 if($conn->errno){
   die($conn->error);
   
   
if(isset($_POST["btnSave"])){
   $txtdsc = $_POST["txtdsc"];
   $txtbrc = $_POST["txtbrc"];
   $intctd = $_POST["intctd"];
   $txtest = $_POST["txtest"];
   $intid = $_POST["intid"];

   $insertSQL = "Insert into categorias (txtdsc, txtbrc, intctd, txtest, intid) ";
   $insertSQL .= "value ('".$txtdsc."','".$txtbrc."','".$intctd."','".$txtest."','".$intid."');";
   $inserted = $conn->query($insertSQL);
   
   $last = $conn->insert_id;}
   
   
   $str = "SELECT * from productos;";
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
    