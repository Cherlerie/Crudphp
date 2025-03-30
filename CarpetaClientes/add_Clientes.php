<?php
require_once "../Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $nombrecontacto = $_POST['nombrecontacto'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccionfacturacion = $_POST['direccionfacturacion'];
    $direccionenvio = $_POST['direccionenvio'];
    $IDTipoPago = $_POST['IDTipoPago'];
    $IDTipoCliente = $_POST['IDTipoCliente'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO cliente (nombre, nombrecontacto, telefono, correo, direccionfacturacion, direccionenvio, IDTipoPago, IDTipoCliente, estado)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssiss", $nombre, $nombrecontacto, $telefono, $correo, $direccionfacturacion, $direccionenvio, $IDTipoPago, $IDTipoCliente, $estado);
        if ($stmt->execute()) {
            header("Location: index_clientes.php");
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="nombrecontacto" placeholder="Nombre Contacto" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="text" name="direccionfacturacion" placeholder="Dirección de Facturación" required>
        <input type="text" name="direccionenvio" placeholder="Dirección de Envío" required>
        <input type="number" name="IDTipoPago" placeholder="ID Tipo Pago" required>
        <input type="number" name="IDTipoCliente" placeholder="ID Tipo Cliente" required>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>