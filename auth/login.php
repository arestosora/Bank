<?php
require_once("../core/Usuarios.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usuarios = new Usuarios();
    $usuario = $usuarios->obtenerUsuarioPorEmail($email);
    if ($usuario && password_verify($password, $usuario["password"])) {
        $_SESSION['id_usuario'] = $usuario['id']; 
        header("Location: ../core/formulario.php");
        exit;
    } else {
        $mensajeInicioSesion = "Error de inicio de sesión. Verifica tus credenciales.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <title>Iniciar Sesión</title>
    <script src="../scripts/login_script.js"></script>
</head>
<body>
    <form method="post" action="login.php" onsubmit="return validarFormulario();">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión">
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>.</p>

        <?php if (isset($mensajeInicioSesion)): ?>
            <p id="mensaje-inicio-sesion" style="opacity: 0;"><?php echo $mensajeInicioSesion; ?></p>
        <?php endif; ?>
        <p id="error-message" style="display:none;" class="error-message"></p>
    </form>
</body>
</html>
