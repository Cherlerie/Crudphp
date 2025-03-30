<?php
require_once "../conexion.php";

if ($_POST) {
    $aprobado = $_POST['aprobado'];
    $precio = $_POST['precio'];
    $idProveedor = $_POST['IDProveedor'];

    $sql = "INSERT INTO articulo (Nombre, aprobado, precio, IDProveedor) 
    VALUES ('$nombre', '$aprobado', $precio, $idProveedor)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_articulo.php");
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
    <title>Agregar Artículo</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Agregar Nuevo Artículo</h1>
    <form method="post">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
        <label>Aprobado:</label><br>
        <select name="aprobado" required>
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select><br>
        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_articulo.php">Volver a la Lista</a>
</body>
</html>
