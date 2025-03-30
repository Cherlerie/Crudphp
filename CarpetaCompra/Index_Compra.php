<?php
require_once "../Conexion.php";
$sql = "SELECT c.IDCompra, p.nombre AS proveedor, c.fecha_compra, c.numero_factura, c.monto_total 
        FROM compra c 
        JOIN proveedor p ON c.IDProveedor = p.IDProveedor";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Compras</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Compras Realizadas</h1>
    <a href="add_compra.php" class="btn">Registrar Compra</a>
    <table>
        <tr>
            <th>ID Compra</th>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Monto Total</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?php echo $fila['IDCompra']; ?></td>
            <td><?php echo $fila['proveedor']; ?></td>
            <td><?php echo $fila['fecha_compra']; ?></td>
            <td><?php echo $fila['numero_factura']; ?></td>
            <td><?php echo $fila['monto_total']; ?></td>
            <td>
                <a href="edit_Compra.php?id=<?php echo $fila['IDCompra']; ?>">Editar</a>
                <a href="delete_Compra.php?id=<?php echo $fila['IDCompra']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta compra?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
