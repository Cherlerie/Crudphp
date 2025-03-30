<?php
require_once "../conexion.php";

// Obtener la lista de productos
$productos = $conn->query("SELECT IDProducto, nombre FROM producto");

if ($_POST) {
    $IDProducto = $_POST['IDProducto'];
    $evento = $_POST['evento'];
    $cantidad_afectada = $_POST['cantidad_afectada'];

    $sql = "INSERT INTO historial (IDProducto, evento, cantidad_afectada) VALUES ('$IDProducto', '$evento', '$cantidad_afectada')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_historial.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Registro de Historial</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Registro de Historial</h1>
    <form method="post">
        <label>Producto:</label><br>
        <select name="IDProducto" required>
            <?php while ($producto = $productos->fetch_assoc()) { ?>
                <option value="<?php echo $producto['IDProducto']; ?>"><?php echo $producto['nombre']; ?></option>
            <?php } ?>
        </select><br>
        <label>Evento:</label><br>
        <input type="text" name="evento" required><br>
        <label>Cantidad Afectada:</label><br>
        <input type="number" name="cantidad_afectada" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_historial.php">Volver a la Lista</a>
</body>
</html>
