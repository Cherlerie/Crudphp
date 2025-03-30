<?php
require_once "../conexion.php";
if ($_POST) {
    $nombre = $_POST['nombre'];
    $abreviatura = $_POST['abreviatura'];

    $sql = "INSERT INTO unidad_medida (nombre, abreviatura) VALUES ('$nombre', '$abreviatura')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_unidad.php");
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
    <title>Agregar Unidad de Medida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Nueva Unidad de Medida</h1>
    <form method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label>Abreviatura:</label><br>
        <input type="text" name="abreviatura" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_unidad.php">Volver a la Lista</a>
</body>
</html>
