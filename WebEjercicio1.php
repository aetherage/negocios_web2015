<?php
////////////////////////////////////////////////////////////////////////////////////////////////

    $numero1 = 0;
    $numero2 = 0;
    $iteraciones = 10;
    $msg = "";
    
    
/////////////////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST["btnPrc"])){
        $numero1 = intval($_POST["numero1"]); //intval transforma a entero. porque
        //usualmente POST lo toma como STRING.
        $numero2 = intval($_POST["numero2"]);
        $newValue = $numero1;
        
        for($i = 0; $i<$numero2-1; $i++){
            $newValue *= $numero1;
        }
        $msg = "El Valor: $numero1 a la potencia $numero2 es igual a $newValue" ;
    }
    
    
////////////////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST["btnRev"])){
        $numero1 = intval($_POST["numero1"]);
        $iteraciones = intval($_POST["iteraciones"]);
        $contador = 1;
        
        while($iteraciones>0){
            $msg .= "$contador ). Producto" . ($numero1 * $iteraciones) . "</br>";
              //  el .= CONCATENA
              $contador ++;
              $iteraciones --;
             }
             
        $iteraciones = intval($_POST["iteraciones"]);
    }
    
    
////////////////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST["btnFac"])){    

        $facto = 1;
        $numero2 = intval($_POST["numero2"]);
        for($i = 1; $i<=$numero2; $i++){
            $facto *= $i;
        }
       $msg = "El resultado del factorial $numero2 es $facto"; 
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////

?>

<!--//////////////////////////////////////////////////////////////////////////////////////////// -->

<!DOCTYPE html>
    <html>

<!--//////////////////////////////////////////////////////////////////////////////////////////// -->

        
        <head>
            <meta charset="utf-8"/>
            <title>Ejercicio 2 Switch y ciclos</title>
        </head>

        
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->


        <body>
            <h1>Ejemplo de Switch y Ciclos en PHP</h1>
            
        <form action="WebEjercicio1.php" method="post">

            
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->

        
        <label for="numero1">Numero 1</label>
        <input type="text" id="numero1" name="numero1" value=" <?php echo $numero1; ?>"/>
                  
                   <br/>


<!--//////////////////////////////////////////////////////////////////////////////////////////// -->                   
     
     
     <label for="numero2">Numero 2</label>
        <input type="text" id="numero2" name="numero2" value=" <?php echo $numero2; ?>"/>
                  
                   <br/>


<!--//////////////////////////////////////////////////////////////////////////////////////////// -->                   
     
     
     <label for="iteraciones">Numero de iteraciones</label>
        <select name="iteraciones" id="iteraciones">
            
                <option value="10" <?php if ($iteraciones == 10) { echo " selected"; }?>>10</option>
                <option value="20" <?php if ($iteraciones == 20) { echo " selected"; }?>>20</option>
                <option value="50" <?php if ($iteraciones == 50) { echo " selected"; }?>>50</option>
                <option value="100" <?php if ($iteraciones == 100) { echo " selected"; }?>>100</option>
                
        </select>
        
        <br/>
                
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->        
        
        
        <input type="submit" value="Procesar" name="btnPrc" id="btnPrc"/>
        <input type="submit" value="Reversar" name="btnRev" id="btnRev"/>
        <input type="submit" value="Factorial" name="btnFac" id="btnFac"/>
        
        
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->        
   
        </form>

<!--//////////////////////////////////////////////////////////////////////////////////////////// -->
        
        <div>
            <?php echo $msg ; ?>
        </div>
        
        </body>
        
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->

    </html>
    
<!--//////////////////////////////////////////////////////////////////////////////////////////// -->
    