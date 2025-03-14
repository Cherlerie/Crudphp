<?php
include 'ConexionProveedor.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM proveedor WHERE IDProveedor = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_POST) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tiempo_entrega = $_POST['tiempo_entrega'];
    $estado = $_POST['estado'];
    $condiciones_pago = $_POST['condiciones_pago'];

    $sql = "UPDATE proveedor SET nombre='$nombre', direccion='$direccion', tiempo_entrega=$tiempo_entrega, estado='$estado', condiciones_pago='$condiciones_pago' WHERE IDProveedor = $id";
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
    <title>Editar Proveedor</title>
        <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Editar Proveedor</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['IDProveedor']; ?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>"><br>
        <label>Tiempo de Entrega (días):</label><br>
        <input type="number" name="tiempo_entrega" value="<?php echo $row['tiempo_entrega']; ?>"><br>
        <label>Estado:</label><br>
        <input type="text" name="estado" value="<?php echo $row['estado']; ?>"><br>
        <label>Condiciones de Pago:</label><br>
        <input type="text" name="condiciones_pago" value="<?php echo $row['condiciones_pago']; ?>"><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_proveedor.php">Volver a la Lista</a>
</body>
</html>
