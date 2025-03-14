<?php
include 'ConexionCategoria.php';

$sql    = "SELECT * FROM categoria";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorías</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Categorías</h1>
    <a href="add_Categoria.php">Agregar Nueva Categoría</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['IDCategoria']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td>
                <a href="edit_Categoria.php?id=<?php echo $row['IDCategoria']; ?>">Editar</a> |
                <a href="delete_Categoria.php?id=<?php echo $row['IDCategoria']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
