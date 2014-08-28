<!--CONTROL DE ACCESO A LA APLICACION-->

<?php
if($_REQUEST["user"]=="JnJ" && $_REQUEST["pass"]=="qwert"){
            session_name("login"); //Se da un nombre a la sesion
            session_start(); //Se inicia la sesion
            $_SESSION["autenticado"] = "SI"; //Se confirma la autorizacion del usuario en la sesion
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s"); //Se define la fecha y hora de inicio de sesion en formato AAAA-MM-DD HH:MM:SS
            header("Location:3.2.php");//Se direcciona a la pagina principal
        }else{
            //Si el usuario o clave no son validos se reenvia a la pagina de logueo
            header("Location:index.php?error=SI"); //Se pasa la variable de error a la pagina de logueo
        }
        

?>

