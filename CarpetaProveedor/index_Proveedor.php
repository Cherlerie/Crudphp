<?php
include 'ConexionProveedor.php';

$sql = "SELECT * FROM proveedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Proveedores</h1>
    <a href="add_proveedor.php">Agregar Nuevo Proveedor</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Tiempo de Entrega</th>
            <th>Estado</th>
            <th>Condiciones de Pago</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDProveedor']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['tiempo_entrega']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['condiciones_pago']; ?></td>
            <td>
                <a href="edit_proveedor.php?id=<?php echo $row['IDProveedor']; ?>">Editar</a> |
                <a href="delete_proveedor.php?id=<?php echo $row['IDProveedor']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
