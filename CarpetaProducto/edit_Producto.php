<?php
include 'ConexionProducto.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM producto WHERE IDProducto = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_POST) {
    $id = $_POST['id'];
    $codigo_barra = $_POST['codigo_barra'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock_actual = $_POST['stock_actual'];
    $precio_unitario = $_POST['precio_unitario'];
    $unidades_medidas = $_POST['unidades_medidas'];
    $costo_adquisicion = $_POST['costo_adquisicion'];
    $idCategoria = $_POST['IDCategoria'];

    $sql = "UPDATE producto SET 
    codigo_barra='$codigo_barra', 
    nombre='$nombre', 
    descripcion='$descripcion', 
    stock_actual=$stock_actual, 
    precio_unitario=$precio_unitario, 
    unidades_medidas='$unidades_medidas', 
    costo_adquisicion=$costo_adquisicion, 
    IDCategoria=$idCategoria 
    WHERE IDProducto = $id";

    
    if ($conn->query($sql) === TRUE) {
        header("Location: index_producto.php");
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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Editar Producto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['IDProducto']; ?>">
        <label>Código de Barra:</label><br>
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>

        <input type="text" name="codigo_barra" value="<?php echo $row['codigo_barra']; ?>"><br>
        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>" required><br>
        <label>Stock Actual:</label><br>
        <input type="number" name="stock_actual" value="<?php echo $row['stock_actual']; ?>" required><br>
        <label>Precio Unitario:</label><br>
        <input type="number" step="0.01" name="precio_unitario" value="<?php echo $row['precio_unitario']; ?>" required><br>
        <label>Unidad de Medida:</label><br>
        <input type="text" name="unidades_medidas" value="<?php echo $row['unidades_medidas']; ?>"><br>
        <label>Costo de Adquisición:</label><br>
        <input type="number" step="0.01" name="costo_adquisicion" value="<?php echo $row['costo_adquisicion']; ?>"><br>
        <label>ID Categoría:</label><br>
        <input type="number" name="IDCategoria" value="<?php echo $row['IDCategoria']; ?>"><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_producto.php">Volver a la Lista</a>
</body>
</html>
