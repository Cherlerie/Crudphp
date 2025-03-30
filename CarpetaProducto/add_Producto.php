<?php
require_once "../conexion.php";
if ($_POST) {
    $codigo_barra = $_POST['codigo_barra'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock_actual = $_POST['stock_actual'];
    $precio_unitario = $_POST['precio_unitario'];
    $unidades_medidas = $_POST['unidades_medidas'];
    $costo_adquisicion = $_POST['costo_adquisicion'];
    $idCategoria = $_POST['IDCategoria'];

    $sql = "INSERT INTO producto (codigo_barra, nombre, descripcion, stock_actual, precio_unitario, unidades_medidas, costo_adquisicion, IDCategoria) 
        VALUES ('$codigo_barra', '$nombre', '$descripcion', $stock_actual, $precio_unitario, '$unidades_medidas', $costo_adquisicion, $idCategoria)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_producto.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connProducto->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Agregar Nuevo Producto</h1>
    <form method="post">
        <label>Código de Barra:</label><br>
        <input type="text" name="codigo_barra"><br>
        <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
        <label>Descripción:</label><br>
        <input type="text" name="descripcion" required><br>
        <label>Stock Actual:</label><br>
        <input type="number" name="stock_actual" required><br>
        <label>Precio Unitario:</label><br>
        <input type="number" step="0.01" name="precio_unitario" required><br>
        <label>Unidad de Medida:</label><br>
        <input type="text" name="unidades_medidas"><br>
        <label>Costo de Adquisición:</label><br>
        <input type="number" step="0.01" name="costo_adquisicion"><br>
        <label>ID Categoría:</label><br>
        <input type="number" name="IDCategoria"><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_producto.php">Volver a la Lista</a>
</body>
</html>
