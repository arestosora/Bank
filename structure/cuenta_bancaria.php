<?php
require_once("../core/CuentaBancaria.php");

session_start();

$cuentaBancaria = new CuentaBancaria();

if (isset($_SESSION['id_usuario'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $saldo = $cuentaBancaria->obtenerSaldo($idUsuario);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = $_POST["accion"];
        $monto = $_POST["monto"];
        if ($monto > 0) {
            switch ($accion) {
                case "consignar":
                    $nuevoSaldo = $cuentaBancaria->consignar($idUsuario, $monto);
                    break;

                case "retirar":
                    $nuevoSaldo = $cuentaBancaria->retirar($idUsuario, $monto);
                    break;

                case "transferir":
                    $idUsuarioDestino = $_POST["id_usuario_destino"];
                    $nuevoSaldo = $cuentaBancaria->transferir($idUsuario, $idUsuarioDestino, $monto);
                    break;

                default:
                    echo "Acción no válida.";
            }
        } else {
            echo "El monto debe ser mayor que cero.";
        }
    }
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/cuenta_bancaria.css">
    <title>Cuenta Bancaria</title>
</head>

<body>
    <div id="header">
        <h1>Cuenta Bancaria</h1>
        <div id="saldo-container">
            <p id="saldo-label">Saldo actual:</p>
            <p id="saldo-valor">
                <?php echo number_format($saldo); ?>
            </p>
        </div>
    </div>

    <div id="main-content">
        <form id="acciones-form" method="post" action="cuenta_bancaria.php">
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" required>
            <button type="submit" name="accion" value="consignar">Consignar</button>
            <button type="submit" name="accion" value="retirar">Retirar</button>
            <label for="id_usuario_destino">ID Usuario a Transferir:</label>
            <input type="number" id="id_usuario_destino" name="id_usuario_destino">
            <button type="submit" name="accion" value="transferir">Transferir</button>
        </form>

        <?php if (isset($nuevoSaldo)): ?>
            <div id="mensaje-acciones" class="<?php echo ($nuevoSaldo !== false) ? 'exito' : 'error'; ?>">
                <?php echo ($nuevoSaldo !== false) ? 'Operación exitosa' : 'Error en la operación'; ?>
            </div>
            <?php
            header("Location: cuenta_bancaria.php");
            exit;
            ?>
<?php endif; ?>
        <div id="ver-movimientos">
            <button type="button" onclick="location.href='movimientos.php'">Ver movimientos</button>
        </div>
        <div id="cerrar-sesion">
            <p><a href="../auth/logout.php">Cerrar sesión</a></p>
        </div>


    </div>
</body>

</html>