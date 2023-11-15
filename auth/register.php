<?php
require_once("../core/Usuarios.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $cedula = $_POST["cedula"]; // Asegúrate de recibir la cedula desde el formulario
    $usuarios = new Usuarios();
    $usuarios->agregarUsuario($nombre, $email, $password, $cedula);
    header("Location: login.php");
    exit; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <form method="post" action="register.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="cedula">Cédula:</label>
        <input type="text" name="cedula" required><br>

        <input type="submit" value="Registrar">
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
    </form>
</body>
</html>
