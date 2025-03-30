<?php
require_once "../Conexion.php";
$sql = "SELECT * FROM tipo_pago";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tipos de Pago</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Tipos de Pago</h1>
    <a href="add_tipopago.php" class="btn">Agregar Tipo de Pago</a>
    <table>
        <tr>
            <th>IDTipoPago</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?php echo $fila['IDTipoPago']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td>
                <a href="edit_tipopago.php?id=<?php echo $fila['IDTipoPago']; ?>">Editar</a>
                <a href="delete_tipopago.php?id=<?php echo $fila['IDTipoPago']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este tipo de pago?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
