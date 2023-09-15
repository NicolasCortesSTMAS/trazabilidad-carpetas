<?php
// Incluye el archivo de conexión a la base de datos
include("Conexion.php");

if (isset($_POST['guardarf'])) {
    // Obtén los valores del formulario
    $idRegistro = $_POST['idRegistro'];
    $idFiscalizador = $_POST['listaencargado3'];

    // Verifica si ya existe una designación para el registro actual
    $consultaExistencia = "SELECT * FROM `designacion_registro` WHERE `ID_Numero` = '$idRegistro'";
    $resultadoExistencia = mysqli_query($Conexion, $consultaExistencia);

    if (mysqli_num_rows($resultadoExistencia) > 0) {
        // Ya existe una designación para este registro
        echo "Esta carpeta ya tiene un usuario designado.";
    } else {
        // No existe una designación, realiza la inserción en la tabla 'designacion_registro'
        $consultaInsert = "INSERT INTO `designacion_registro`(`ID_DR`, `ID_Numero`, `ID_USUARIO`, `ID_Resultado`, `Observaciones`) VALUES ('','$idRegistro','$idFiscalizador',NULL,'')";

        
       

        if (mysqli_query($Conexion, $consultaInsert)) {
            echo "La designación se ha guardado correctamente.";
        } else {
            echo "Error al guardar la designación: " . mysqli_error($Conexion);
        }
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($Conexion);
?>


