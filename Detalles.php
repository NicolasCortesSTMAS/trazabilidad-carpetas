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
        echo "<p>Fecha/Hora: " . $fila['FechaHora'] . "</p>";
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

// Cerrar la conexión a la base de datos
mysqli_close($Conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designación</title>
</head>
<body>
    <section class="nuevo">
        <h4>Se Designa A:</h4>
        <form action="Designacionfiscalizador.php" method="post">
            <input type="hidden" name="idRegistro" value="<?php echo $idRegistro; ?>">
            <select id="listaencargado3" name="listaencargado3">
                <option value="3">Fernando Albornoz</option>
                <option value="4">Humberto Donoso</option>
                <option value="5">Jorge Tapia</option>
                <option value="6">Mario Godoy</option>
                <option value="7">Jhonatan esquivel</option>
                <option value="8">Cristian Cabrera</option>
            </select>
            <br> 
            <input class="boton" type="submit" name="guardarf" value="Guardar Información">
        </form>
    </section>

    
</body>
</html>
