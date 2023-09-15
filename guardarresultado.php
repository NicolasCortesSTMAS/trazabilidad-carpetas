<!-- 
date_default_timezone_set('America/Santiago');
$script_tz = date_default_timezone_get();
include("conexion.php");


if (isset($_POST['modificar'])){
    $id_numero = $_POST['id'];
    $id_usuario = $_POST['id_usuario'];
    $FechaHora = date("d/m/y, g:i a");
    $resultado = $_POST["Resultado"];
    $observaciones = $_POST["observaciones"];


    // Verifica la conexión
    if (!$Conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Prepara la consulta SQL (aquí estamos asumiendo que tienes una tabla llamada "resultados")
    $sql = "INSERT INTO designacion_registro (ID_Numero, ID_USUARIO,Fecha_Ingreso_Resultado, ID_Resultado, Observaciones)
    VALUES ('$ID_numero','$id_usuario', '$FechaHora', '$resultado', '$observaciones')";

    // Ejecuta la consulta SQL
    if (mysqli_query($Conexion, $sql)) {
        echo "Los datos se ingresaron correctamente.";
    } else {
        echo "Error al ingresar los datos: " . mysqli_error($Conexion);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($Conexion);

    
} -->


<?php
date_default_timezone_set('America/Santiago');
$script_tz = date_default_timezone_get();
include("Conexion.php");

if (isset($_POST['modificar'])) {
    $id_numero = $_POST['id_numero'];
    $id_usuario = $_POST['id_usuario'];
    $FechaHora = date("d/m/y, g:i a");
    $resultado = $_POST["Resultado"];
    $observaciones = $_POST["observaciones"];

    // Verifica la conexión
    if (!$Conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Prepara la consulta SQL (asegúrate de que los nombres de las columnas coincidan con tu tabla)
    $sql = "INSERT INTO designacion_registro (ID_Numero, ID_USUARIO,Fecha_Ingreso_Resultado, ID_Resultado, Observaciones)
    VALUES ('$ID_numero','$id_usuario', '$FechaHora', '$resultado', '$observaciones'))";

    // Ejecuta la consulta SQL
    if (mysqli_query($Conexion, $sql)) {
        echo "Los datos se ingresaron correctamente.";
    } else {
        echo "Error al ingresar los datos: " . mysqli_error($Conexion);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($Conexion);
}
?>

