<?php
require_once "../conexion.php";
$sql = "SELECT * FROM almacen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Almacenes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Almacenes</h1>
    <a href="add_almacen.php">Agregar Nuevo Almacén</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>ID Producto</th>
            <th>Stock</th>
            <th>Stock Máximo</th>
            <th>Stock Mínimo</th>
            <th>Ubicación</th>
            <th>Fecha Actualización</th>
            <th>ID Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDAlmacen']; ?></td>
            <td><?php echo $row['IDProducto']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['stock_maximo']; ?></td>
            <td><?php echo $row['stock_minimo']; ?></td>
            <td><?php echo $row['ubicacion']; ?></td>
            <td><?php echo $row['fecha_actualizacion']; ?></td>
            <td><?php echo $row['IDProveedor']; ?></td>
            <td>
                <a href="edit_almacen.php?id=<?php echo $row['IDAlmacen']; ?>">Editar</a> |
                <a href="delete_almacen.php?id=<?php echo $row['IDAlmacen']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
