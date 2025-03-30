<?php
require_once "../conexion.php";
$sql = "SELECT * FROM contacto";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Contactos</h1>
    <a href="add_contacto.php">Agregar Nuevo Contacto</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>ID Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDContacto']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['IDProveedor']; ?></td>
            <td>
                <a href="edit_contacto.php?id=<?php echo $row['IDContacto']; ?>">Editar</a> |
                <a href="delete_contacto.php?id=<?php echo $row['IDContacto']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este contacto?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
