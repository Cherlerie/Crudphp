<?php
require_once "../conexion.php";
$sql = "SELECT h.IDHistorial, p.nombre AS producto, h.evento, h.cantidad_afectada, h.fecha 
        FROM historial h 
        JOIN producto p ON h.IDProducto = p.IDProducto 
        ORDER BY h.fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Productos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Historial de Productos</h1>
    <a href="add_historial.php">Agregar Nuevo Registro</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Evento</th>
            <th>Cantidad Afectada</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDHistorial']; ?></td>
            <td><?php echo $row['producto']; ?></td>
            <td><?php echo $row['evento']; ?></td>
            <td><?php echo $row['cantidad_afectada']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
                <a href="edit_historial.php?id=<?php echo $row['IDHistorial']; ?>">Editar</a> |
                <a href="delete_historial.php?id=<?php echo $row['IDHistorial']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
