<?php
require_once("../core/Usuarios.php");

// Iniciar sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $usuarios = new Usuarios();
    $usuario = $usuarios->obtenerUsuarioPorEmail($email);

    if ($usuario && password_verify($password, $usuario["password"])) {
        // Inicio de sesión exitoso
        $_SESSION['id_usuario'] = $usuario['id'];  // Guardar el ID del usuario en la sesión
        header("Location: ../structure/cuenta_bancaria.php");
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
    <script src="../scripts/login_script.js" defer></script>
    <title>Iniciar Sesión</title>
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
            <p id="mensaje-inicio-sesion"><?php echo $mensajeInicioSesion; ?></p>
        <?php endif; ?>

        <!-- Elemento para mostrar mensajes de error -->
        <p id="error-message" style="display:none;" class="error-message"></p>
    </form>
</body>
</html>
