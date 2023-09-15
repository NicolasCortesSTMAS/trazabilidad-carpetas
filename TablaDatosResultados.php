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

    <center><h1>Resultados</h1></center>
    <div class="container">
        <div class="row">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>     
                        <th>Número</th>
                        <th>Persona Asiganada</th>
                        <th>Resultado</th>
                        <th>Observaciones</th>
                        <th>Fecha Ingreso Resultado</th>
                        <th>Ingresar/modifcar</th>
                     
                    

                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    include("conexion.php");
                    
                    $consulta = "SELECT
                    dr.ID_Numero,
                    dr.Fecha_Ingreso_Resultado,  
                    u.Nombre AS NombreUsuario,
                    COALESCE(r.ID_Resultado, 'Pendiente') AS Resultado,
                    COALESCE(dr.Observaciones, 'Sin Observaciones') AS Observaciones
                FROM
                    designacion_registro AS dr
                LEFT JOIN usuarios AS u ON dr.ID_USUARIO = u.ID
                LEFT JOIN resultado AS r ON dr.ID_Resultado = r.ID_Resultado
                WHERE 1";
                            
                    $resultado = mysqli_query($Conexion, $consulta);
                    
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['ID_Numero'] . "</td>";
                        echo "<td>" . $fila['NombreUsuario'] . "</td>";
                        echo "<td>" . $fila['Resultado'] . "</td>";
                        echo "<td>" . $fila['Observaciones'] . "</td>";
                        echo "<td>" . $fila['Fecha_Ingreso_Resultado'] . "</td>";
                        echo '<td><a href="IngresoResultado.php?id=' . $fila['ID_Numero'] . '">Ingresar</a></td>';
                        echo "</tr>";
                    }
                    
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