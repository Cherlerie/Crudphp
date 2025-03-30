<?php
require_once "../conexion.php";
if ($_POST) {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tiempo_entrega = $_POST['tiempo_entrega'];
    $estado = $_POST['estado'];
    $condiciones_pago = $_POST['condiciones_pago'];

    $sql = "INSERT INTO proveedor (nombre, direccion, tiempo_entrega, estado, condiciones_pago) VALUES ('$nombre', '$direccion', $tiempo_entrega, '$estado', '$condiciones_pago')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_proveedor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Proveedor</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Agregar Nuevo Proveedor</h1>
    <form method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label>Dirección:</label><br>
        <input type="text" name="direccion"><br>
        <label>Tiempo de Entrega (días):</label><br>
        <input type="number" name="tiempo_entrega"><br>
        <label>Estado:</label><br>
        <input type="text" name="estado"><br>
        <label>Condiciones de Pago:</label><br>
        <input type="text" name="condiciones_pago"><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_proveedor.php">Volver a la Lista</a>
</body>
</html>
