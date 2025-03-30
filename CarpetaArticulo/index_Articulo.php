<?php
require_once "../conexion.php";


$sql = "SELECT * FROM articulo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Artículos</title>
</head>
<body>
    <h1>Artículos</h1>
    <a href="add_articulo.php">Agregar Nuevo Artículo</a>
    <link rel="stylesheet" href="../css/styles.css">

    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Aprobado</th>
            <th>Precio</th>
            <th>ID Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDArticulo']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['aprobado']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['IDProveedor']; ?></td>
            <td>
                <a href="edit_articulo.php?id=<?php echo $row['IDArticulo']; ?>">Editar</a> |
                <a href="delete_articulo.php?id=<?php echo $row['IDArticulo']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este artículo?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
