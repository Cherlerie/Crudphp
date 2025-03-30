<?php
require_once "../conexion.php";
if (!isset($_GET['id'])) {
    exit("Error: ID no proporcionado.");
}

$id = $_GET['id'];
$venta = $conn->query("SELECT * FROM ventas WHERE IDVenta='$id'")->fetch_assoc();
$clientes = $conn->query("SELECT IDCliente, nombre FROM cliente");
$detalles = $conn->query("SELECT dv.*, p.nombre FROM detalle_venta dv JOIN producto p ON dv.IDProducto = p.IDProducto WHERE IDVenta='$id'");

if ($_POST) {
    $estado_venta = $_POST['estado_venta'];
    $conn->query("UPDATE ventas SET estado_venta='$estado_venta' WHERE IDVenta='$id'");
    header("Location: index_ventas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Venta</title>
</head>
<body>
    <h1>Editar Venta</h1>
    <form method="post">
        <label>Estado de Venta:</label>
        <select name="estado_venta">
            <option <?php if ($venta['estado_venta'] == "Pendiente") echo "selected"; ?>>Pendiente</option>
            <option <?php if ($venta['estado_venta'] == "Pagada") echo "selected"; ?>>Pagada</option>
        </select>
        <br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_ventas.php">Volver a la Lista</a>
</body>
</html>
