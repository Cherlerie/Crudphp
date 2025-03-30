<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM historial WHERE IDHistorial = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: No se encontró el registro con ID $id.";
        exit();
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
    exit();
}

$productos = $conn->query("SELECT IDProducto, nombre FROM producto");

if ($_POST) {
    $IDProducto = $_POST['IDProducto'];
    $evento = $_POST['evento'];
    $cantidad_afectada = $_POST['cantidad_afectada'];

    $sql = "UPDATE historial SET IDProducto='$IDProducto', evento='$evento', cantidad_afectada='$cantidad_afectada' WHERE IDHistorial = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_historial.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro de Historial</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Registro de Historial</h1>
    <form method="post">
        <label>Producto:</label><br>
        <select name="IDProducto" required>
            <?php while ($producto = $productos->fetch_assoc()) { ?>
                <option value="<?php echo $producto['IDProducto']; ?>" <?php if ($producto['IDProducto'] == $row['IDProducto']) echo 'selected'; ?>>
                    <?php echo $producto['nombre']; ?>
                </option>
            <?php } ?>
        </select><br>
        <label>Evento:</label><br>
        <input type="text" name="evento" value="<?php echo $row['evento']; ?>" required><br>
        <label>Cantidad Afectada:</label><br>
        <input type="number" name="cantidad_afectada" value="<?php echo $row['cantidad_afectada']; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_historial.php">Volver a la Lista</a>
</body>
</html>
