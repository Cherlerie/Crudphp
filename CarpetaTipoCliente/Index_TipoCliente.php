<?php
require_once "../Conexion.php";
$sql = "SELECT * FROM tipo_cliente";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tipos de Cliente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Tipos de Cliente</h1>
    <a href="add_tipocliente.php" class="btn">Agregar Tipo de Cliente</a>
    <table>
        <tr>
            <th>IDTipoCliente</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?php echo $fila['IDTipoCliente']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td>
                <a href="edit_tipocliente.php?id=<?php echo $fila['IDTipoCliente']; ?>">Editar</a>
                <a href="delete_tipocliente.php?id=<?php echo $fila['IDTipoCliente']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este tipo de cliente?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
