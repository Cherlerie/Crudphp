<?php
require_once "../conexion.php";
$sql = "SELECT v.IDVenta, c.nombre AS cliente, v.fecha_venta, v.monto_total, v.estado_venta 
        FROM ventas v
        JOIN cliente c ON v.IDCliente = c.IDCliente
        ORDER BY v.fecha_venta DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Lista de Ventas</h1>
    <a href="add_venta.php">Agregar Venta</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Venta</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Monto Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDVenta']; ?></td>
            <td><?php echo $row['cliente']; ?></td>
            <td><?php echo $row['fecha_venta']; ?></td>
            <td><?php echo number_format($row['monto_total'], 2); ?></td>
            <td><?php echo $row['estado_venta']; ?></td>
            <td>
                <a href="edit_venta.php?id=<?php echo $row['IDVenta']; ?>">Editar</a> |
                <a href="delete_venta.php?id=<?php echo $row['IDVenta']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta venta?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
