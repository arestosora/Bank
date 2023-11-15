<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <link rel="stylesheet" href="../styles/movimientos.css">
</head>
<body>

<?php
require_once("../core/CuentaBancaria.php"); 

$cuentaBancaria = new CuentaBancaria();
$movimientosPorPagina = 10; 
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $movimientosPorPagina;
$movimientos = $cuentaBancaria->obtenerMovimientosPaginados($movimientosPorPagina, $offset);
$totalMovimientos = $cuentaBancaria->contarMovimientos();
$totalPaginas = ceil($totalMovimientos / $movimientosPorPagina);
?>

<div class="container">
    <h2>Lista de Movimientos</h2>
    <div id="cerrar-sesion">
        <p><a href="cuenta_bancaria.php">Volver</a></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Transacción</th>
                <th>ID Usuario</th>
                <th>ID Usuario Destino</th>
                <th>Nombre Usuario</th>
                <th>Tipo de Movimiento</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movimientos as $movimiento) : ?>
                <tr>
                    <td><?php echo $movimiento['id_transaccion']; ?></td>
                    <td><?php echo $movimiento['id_usuario']; ?></td>
                    <td><?php echo $movimiento['id_usuario_destino']; ?></td>
                    <td><?php echo $movimiento['nombre_usuario']; ?></td>
                    <td><?php echo $movimiento['tipo_movimiento']; ?></td>
                    <td><?php echo number_format($movimiento['monto'], 2, ',', '.'); ?></td>
                    <td><?php echo $movimiento['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
            <a href="?pagina=<?php echo $i; ?>" <?php if ($i == $paginaActual) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

</body>
</html>
