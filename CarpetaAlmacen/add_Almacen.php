<?php
require_once "../conexion.php";

if ($_POST) {
    $IDProducto = $_POST['IDProducto'];
    $stock = $_POST['stock'];
    $stock_maximo = $_POST['stock_maximo'];
    $stock_minimo = $_POST['stock_minimo'];
    $ubicacion = $_POST['ubicacion'];
    $IDProveedor = $_POST['IDProveedor'];

    $sql = "INSERT INTO almacen (IDProducto, stock, stock_maximo, stock_minimo, ubicacion, IDProveedor) 
            VALUES ('$IDProducto', '$stock', '$stock_maximo', '$stock_minimo', '$ubicacion', '$IDProveedor')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_almacen.php");
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
    <title>Agregar Almacén</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Nuevo Almacén</h1>
    <form method="post">
        <label>ID Producto:</label><br>
        <input type="number" name="IDProducto" required><br>
        <label>Stock:</label><br>
        <input type="number" name="stock" required><br>
        <label>Stock Máximo:</label><br>
        <input type="number" name="stock_maximo" required><br>
        <label>Stock Mínimo:</label><br>
        <input type="number" name="stock_minimo" required><br>
        <label>Ubicación:</label><br>
        <input type="text" name="ubicacion" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_almacen.php">Volver a la Lista</a>
</body>
</html>
