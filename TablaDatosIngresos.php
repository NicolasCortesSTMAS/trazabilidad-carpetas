<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Registrados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <center><h1>Carpetas Ingresadas</h1></center>
    <div class="container">
        <div class="row">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>     
                        <th>Número</th>
                        <th>Fecha/Hora</th>
                        <th>Tipo</th>
                        <th>Revisión</th>
                        <th>Nombre Ingreso</th>
                        <th>ID Agente</th>
                        <th>Nombre Agente</th>
                        <th>Fiscalizador</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Incluir el archivo de conexión
                    include("conexion.php");

                    // Realizar la consulta
                    $consulta = "SELECT r.`ID_Numero`, r.`FechaHora`, r.`Tipo`, r.`Revision`, r.`NombreUsuario`, r.`ID_Agente`, a.`Nombre` AS NombreAgente, u.`Nombre` AS Fiscalizador
                                 FROM `registros` r
                                 JOIN `agentes` a ON r.`ID_Agente` = a.`ID_Agente`
                                 JOIN `usuarios` u ON r.`ID_usuario` = u.`ID`";
                    $resultado = mysqli_query($Conexion, $consulta);

                    // Mostrar los resultados en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['ID_Numero'] . "</td>";
                        echo "<td>" . $fila['FechaHora'] . "</td>";
                        echo "<td>" . $fila['Tipo'] . "</td>";
                        echo "<td>" . $fila['Revision'] . "</td>";
                        echo "<td>" . $fila['NombreUsuario'] . "</td>";
                        echo "<td>" . $fila['ID_Agente'] . "</td>";
                        echo "<td>" . $fila['NombreAgente'] . "</td>";
                        echo "<td>" . $fila['Fiscalizador'] . "</td>";
                        echo '<td><a href="detalles.php?id=' . $fila['ID_Numero'] . '">Ver Detalles</a></td>';
                      
                        echo "</tr>";
                       
                    }

                    // Cerrar la conexión
                    mysqli_close($Conexion);
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
