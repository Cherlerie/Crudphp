<?php
require_once "../conexion.php";
$sql = "SELECT * FROM producto";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Productos</h1>
    <a href="add_producto.php">Agregar Nuevo Producto</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Código de Barra</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock Actual</th>
            <th>Precio Unitario</th>
            <th>Unidad de Medida</th>
            <th>Costo de Adquisición</th>
            <th>ID Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDProducto']; ?></td>
            <td><?php echo $row['codigo_barra']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['stock_actual']; ?></td>
            <td><?php echo $row['precio_unitario']; ?></td>
            <td><?php echo $row['IDUnidad']; ?></td>
            <td><?php echo $row['costo_adquisicion']; ?></td>
            <td><?php echo $row['IDCategoria']; ?></td>
            <td>
                <a href="edit_producto.php?id=<?php echo $row['IDProducto']; ?>">Editar</a> |
                <a href="delete_producto.php?id=<?php echo $row['IDProducto']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
