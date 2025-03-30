<?php
require_once "../conexion.php";
if ($_POST) {
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO categoria (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_categoria.php");
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
    <title>Agregar Categoría</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Agregar Nueva Categoría</h1>
    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>
        <label>Descripción:</label><br>
        <textarea name="descripcion"></textarea><br><br>
        <input type="submit" value="Guardar">
    </form>
    <br>
    <a href="index_categoria.php">Volver a la Lista</a>
</body>
</html>
