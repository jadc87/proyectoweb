<!-- PAGINA DE TEMPORIZACION -->

<?php
/* 
	Codigo tomado de: http://www.desarrolloweb.com/articulos/1991.php 
	Se modificaron comentarios de acuerdo a lo entendido
*/

//Se inicia la sesion
session_name("login");
session_start();

//Se verifica que el usuario este logueado
if ($_SESSION["autenticado"] != "SI") {
    //sino, se redirecciona a la pagina de logueo
    header("Location:index.php");
} else {
    //Se crean variables para calcular el tiempo de inactividad
    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)- strtotime($fechaGuardada)); //Calculo del tiempo con la sesion activa
	//La instruccion strtotime se usa para convertir las variables de tiempo a segundos y asi poder trabajarlas

    //Se compara el tiempo transcurrido, para este caso es de 5 minutos = 300 segundos
     if($tiempo_transcurrido >= 300) {
     //Si pasaron 5 minutos o más
      session_destroy(); //Se destruye la sesion
      header("Location: index.php"); //Se envia al usuario a la pagina de logueo
    }else {
    //Sino, se actualiza la fecha de la sesión
	$_SESSION["ultimoAcceso"] = $ahora;
   }
}
?>