<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");

// Verifica si se proporcionó un ID válido en la URL
if (isset($_GET['id'])) {
    $idRegistro = $_GET['id'];

    // Realiza una consulta a la base de datos para obtener los detalles del registro con el ID proporcionado
    $consulta = "SELECT * FROM registros WHERE ID_Numero = $idRegistro";
    $resultado = mysqli_query($Conexion, $consulta);

    // Realiza una consulta para obtener los nombres del agente y el usuario asociados al registro
    $consulta2 = "SELECT agentes.nombre AS Nombre_Agente, usuarios.nombre AS Nombre_Usuario
    FROM registros
    LEFT JOIN agentes ON registros.ID_Agente = agentes.ID_Agente
    LEFT JOIN usuarios ON registros.ID_usuario = usuarios.ID;";
    $resultado2 = mysqli_query($Conexion, $consulta2);

    // Verifica si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        // Muestra todos los detalles del registro
        echo "<h2>Detalles del Registro</h2>";
        echo "<p>ID: " . $fila['ID_Numero'] . "</p>";
        echo "<p>Fecha/Hora Ingresada: " . $fila['FechaHora'] . "</p>";
        echo "<p>Tipo: " . $fila['Tipo'] . "</p>";
        echo "<p>Revisión: " . $fila['Revision'] . "</p>";
        echo "<p>Nombre de Usuario: " . $fila['NombreUsuario'] . "</p>";
        echo "<p>ID de Agente: " . $fila['ID_Agente'] . "</p>";

        // Muestra los nombres del agente y el usuario
        if (mysqli_num_rows($resultado2) > 0) {
            $fila2 = mysqli_fetch_assoc($resultado2);
            echo "<p>Nombre de Agente: " . $fila2['Nombre_Agente'] . "</p>";
            echo "<p>Nombre de Usuario: " . $fila2['Nombre_Usuario'] . "</p>";
        }
    } else {
        echo "No se encontraron registros con el ID proporcionado.";
    }
} else {
    echo "No se proporcionó un ID válido.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Datos</title>
    <!-- <link rel="stylesheet" type="text/css" href="estilo.css">  -->
</head>
<body>
    <form method="post">
        





        <section class="Form-registro">
            <p id="fechaHora"></p>
            
            <script>
                var fechaHoraActual = new Date();
                var dia = fechaHoraActual.getDate();
                var mes = fechaHoraActual.getMonth() + 1;
                var año = fechaHoraActual.getFullYear();
                var horas = fechaHoraActual.getHours();
                var minutos = fechaHoraActual.getMinutes();
                var fechaHoraFormateada = dia + '/' + mes + '/' + año + ' ' + horas + ':' + minutos;
                document.getElementById("fechaHora").textContent = fechaHoraFormateada;
            </script>

            <section class="nuevo">
                <h4>Selecciones Resultados Obtenidos:</h4>
                <select id="Resultado" name="Resultado">
                    <option value="1">1.SIN OBSERVACIONES</option>
                    <option value="2">2.TOMA DE MUESTRAS</option>
                    <option value="3">3.DUDA RAZONABLE (VALORACION)</option>
                    <option value="4">4.CAMBIO DE REGIMEN DE IMPORTACION</option>
                    <option value="5">5.DENUNCIA POR CONTRABANDO</option>
                    <option value="6">6.DENUNCIA POR DROGAS</option>
                    <option value="7">7.DENUNCIA ASOCIADA AL MEDIO AMBIENTE</option>
                    <option value="8">8.DENUNCIA ASOCIADA A LA SALUD PUBLICA</option>
                    <option value="9">9.DENUNCIA ASOACIADA A LA SEGURIDAD EN LA CADENA LOGISTIA</option>
                    <option value="10">10.DENUNCIA ASOCIADA POR ABUSO DE REQUISITOS (V°B°,CERTIFICADOS, RESOLUCIONES)</option>
                    <option value="11">11.DENUCNIA ASOSIADA A PTRIMONIO ARTISTICO - CULTURAL</option>
                    <option value="12">12.SUSPENSION DEL DESPACHO POR PROPIEDAD INTELECTUAL</option>
                    <option value="13">13.OTROS RESULTADOS (ESPECIFICAR EN RECUADRO OBSERVACIONES)</option>
                </select>
                <br>
                <input class="" id="observaciones" name="observaciones" placeholder="OBSERVACIONES">

            </section>
         
            <input class="boton" type="submit" name="modificar" value="Ingresar Resultado">
            <form method="post" action="guardarresultado.php">
            <input type="hidden" name="id_numero" value="' . $idNumero . '">
            <input type="hidden" name="id_usuario" value="' . $idUsuario . '">

      
        </section>
    

       
</form>

    </form>

    <?php
    include("registrar.php");
    
    ?>

</body>
</html>