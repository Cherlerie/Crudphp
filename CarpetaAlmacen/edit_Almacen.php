<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM almacen WHERE IDAlmacen = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: No se encontró el registro.";
        exit();
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
    exit();
}

if ($_POST) {
    $IDProducto = $_POST['IDProducto'];
    $stock = $_POST['stock'];
    $stock_maximo = $_POST['stock_maximo'];
    $stock_minimo = $_POST['stock_minimo'];
    $ubicacion = $_POST['ubicacion'];
    $IDProveedor = $_POST['IDProveedor'];

    $sql = "UPDATE almacen SET IDProducto='$IDProducto', stock='$stock', stock_maximo='$stock_maximo', 
            stock_minimo='$stock_minimo', ubicacion='$ubicacion', IDProveedor='$IDProveedor' 
            WHERE IDAlmacen = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_almacen.php");
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
    <title>Editar Almacén</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Almacén</h1>
    <form method="post">
        <label>ID Producto:</label><br>
        <input type="number" name="IDProducto" value="<?php echo $row['IDProducto']; ?>" required><br>
        <label>Stock:</label><br>
        <input type="number" name="stock" value="<?php echo $row['stock']; ?>" required><br>
        <label>Stock Máximo:</label><br>
        <input type="number" name="stock_maximo" value="<?php echo $row['stock_maximo']; ?>" required><br>
        <label>Stock Mínimo:</label><br>
        <input type="number" name="stock_minimo" value="<?php echo $row['stock_minimo']; ?>" required><br>
        <label>Ubicación:</label><br>
        <input type="text" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" value="<?php echo $row['IDProveedor']; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_almacen.php">Volver a la Lista</a>
</body>
</html>
