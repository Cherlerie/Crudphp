<?php
require_once "../Conexion.php";
$sql = "SELECT * FROM cliente";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Clientes</h1>
    <a href="add_clientes.php">Agregar Cliente</a>
    <table>
        <tr>
            <th>IDCliente</th>
            <th>Nombre</th>
            <th>Nombre Contacto</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección Facturación</th>
            <th>Dirección Envío</th>
            <th>Tipo Pago</th>
            <th>Tipo Cliente</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?php echo $fila['IDCliente']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['nombrecontacto']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td><?php echo $fila['direccionfacturacion']; ?></td>
            <td><?php echo $fila['direccionenvio']; ?></td>
            <td><?php echo $fila['IDTipoPago']; ?></td>
            <td><?php echo $fila['IDTipoCliente']; ?></td>
            <td><?php echo $fila['estado']; ?></td>
            <td>
                <a href="edit_clientes.php?id=<?php echo $fila['IDCliente']; ?>">Editar</a>
                <a href="delete_clientes.php?id=<?php echo $fila['IDCliente']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
