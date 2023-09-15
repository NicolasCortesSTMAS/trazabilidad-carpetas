<?php


date_default_timezone_set('America/Santiago');
$script_tz = date_default_timezone_get();

include("Conexion.php");

if (isset($_POST['guardar'])){


    if (strlen($_POST['nombre_usuario']) >= 1 && strlen($_POST['nagente']) >= 1) {

        $numerod = trim($_POST['numerod']);
        $FechaHora = date("d/m/y, g:i a");
        $tipo = trim($_POST['documento']);
        $revision = trim($_POST['tipo_revision']);
        $nombre_usuario = trim($_POST['nombre_usuario']);
        $fiscalizador = trim($_POST['listaencargado']);
        $nagente = trim($_POST['nagente']);
        
        $consulta = "INSERT INTO `registros`(`ID_Numero`, `FechaHora`, `Tipo`, `Revision`, `NombreUsuario`, `ID_Agente`, `ID_usuario`) VALUES ('$numerod','$FechaHora','$tipo','$revision','$nombre_usuario','$nagente','$fiscalizador')";

        $resultado = mysqli_query($Conexion,$consulta);

        if ($resultado){
            ?>
            <h3 class = "ok"> Datos Ingresados Correctamente</h3>
            <?php
        } else{
            ?>
            <h3 class="bad"> Error al Ingresar Datos</h3>
            <?php

        }


    }   else{
        ?> 
	    <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php
    }
}



?>