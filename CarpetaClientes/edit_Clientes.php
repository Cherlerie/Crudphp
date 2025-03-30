<?php
require_once "../Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombrecontacto = $_POST['nombrecontacto'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccionfacturacion = $_POST['direccionfacturacion'];
    $direccionenvio = $_POST['direccionenvio'];
    $IDTipoPago = $_POST['IDTipoPago'];
    $tipocliente = $_POST['tipocliente'];
    $estado = $_POST['estado'];

    $sql = "UPDATE cliente SET nombre=?, nombrecontacto=?, teléfono=?, correo=?, direccionfacturacion=?, direccionenvio=?, IDTipoPago=?, tipocliente=?, estado=? WHERE IDCliente=?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $nombrecontacto, $telefono, $correo, $direccionfacturacion, $direccionenvio, $IDTipoPago, $tipocliente, $estado, $id]);

    header("Location: index_cliente.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM cliente WHERE IDCliente=?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);
$cliente = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['IDCliente']; ?>">
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        <input type="text" name="nombrecontacto" value="<?php echo $cliente['nombrecontacto']; ?>" required>
        <input type="text" name="telefono" value="<?php echo $cliente['teléfono']; ?>" required>
        <input type="email" name="correo" value="<?php echo $cliente['correo']; ?>" required>
        <input type="text" name="direccionfacturacion" value="<?php echo $cliente['direccionfacturacion']; ?>" required>
        <input type="text" name="direccionenvio" value="<?php echo $cliente['direccionenvio']; ?>" required>
        <input type="number" name="IDTipoPago" value="<?php echo $cliente['IDTipoPago']; ?>" required>
        <input type="text" name="tipocliente" value="<?php echo $cliente['tipocliente']; ?>" required>
        <input type="text" name="estado" value="<?php echo $cliente['estado']; ?>" required>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
