# negocios_web2015
Repositorio destinado para el deposito de Ejercicios realizados en la Clase de Negocios Web para el primer periodo academico del 2015 en la UNICAH Campus SCJ.



El siguiente Link es una explicacion de como Combinar los "Forks" o como aparece en la pagina " Merge Forks" 
de Esta manera podran hacer una copia actualizada del repositorio Objetivo.

http://stackoverflow.com/questions/20984802/how-can-i-keep-my-fork-in-sync-without-adding-a-separate-remote/21131381#21131381

Porque sucede esto?
Debido a la duplicidad del nombre de repertorio encadenado a otros repertorios con ese mismo nombre
el servidor no puede definir a cual exactamente desean "entrincharse" y esa guia es para darle a entender
al servidor cual es el repositorio objetivo que necesitamos.




// codigo de tarea.

<?php
    session_start(); // crea variables persistentes. para que este disponible.
    // debe iniciarse por obligacion. todo lo que se va guardar en session
    // deber guardarse en un arreglo especial.
    $_SESSION["username"] = "Usuario";
    // como esta.
    
    
    $contenidoSession = "";
    
    function agregarSession($data){
       // global $contenidoSession;
       // $contenidoSession = "asdzx  ";
        return "AS Contenido :" . $data;
    }
    
    function eliminarDeSession($data){
        return "Es Contenido :" . $data;
    }
    
    
    if(!isset($_SESSION["click"])){
        $_SESSION["click"] = 0;
    }
    
    if(isset($_POST["btnAdd"])){
       $contenidoSession .= agregarSession($_POST["txtData"]);
        $_SESSION["click"]++;
    }
    
    if(isset($_POST["btnSubs"])){
        $contenidoSession = eliminarDeSession($_POST["txtData"]);
         $_SESSION["click"]++;
    }
    
    // tarea, crear otro archivo solo en php con session start con un print_r de la session o de los clicks
    // para ver que aparece.
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Funciones y Session.</title>
        </head>
        <body>
            <h1>Funciones y el arreglo SESSION.</h1>
            <form action="ejercicio5.php" method="POST">
                <label for="txtData">DATA</label>    
                <input type="text" id="txtData" name="txtData"/>
                <br/>
                <input type="submit" name="btnAdd" id="btnAdd" value="Agregar a la session"/>
                <input type="submit" name="btnSubs" id="btnSubs" value="Eliminar de la Session"/>
            </form>
            <div>
                <?php echo $contenidoSession; ?>
            </div>
        </body>
    </html>
