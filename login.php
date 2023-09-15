<?php
session_start();
include("Conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para verificar el correo y contraseña
$consulta = "SELECT * FROM `usuarios` WHERE email ='$email' AND password='$password'";

$resultado = mysqli_query($Conexion, $consulta);

        if ($resultado->num_rows > 0) {

            // Obtener el nombre del usuario
            $row = $resultado->fetch_assoc();
            $name = $row["Nombre"];

            // Iniciar sesión
            session_start();
            $_SESSION["login_user"] = $username;
            $_SESSION["login_name"] = $name;

            // Redirigir a la página principal
            header("Location: Seleccion de Tablas.php");

        } else {

            // Mostrar un mensaje de error
            echo "<p>El usuario o la contraseña son incorrectos.</p>";

        }


mysqli_close($Conexion);
?>
