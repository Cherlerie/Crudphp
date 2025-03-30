<?php
require_once "../conexion.php";
$sql = "SELECT * FROM unidad_medida";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Unidades de Medida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Unidades de Medida</h1>
    <a href="add_unidad.php">Agregar Nueva Unidad</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Abreviatura</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDUnidad']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['abreviatura']; ?></td>
            <td>
                <a href="edit_unidad.php?id=<?php echo $row['IDUnidad']; ?>">Editar</a> |
                <a href="delete_unidad.php?id=<?php echo $row['IDUnidad']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta unidad de medida?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
