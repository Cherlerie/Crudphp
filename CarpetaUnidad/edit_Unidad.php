<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM unidad_medida WHERE IDUnidad = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: No se encontró la unidad con ID $id.";
        exit();
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
    exit();
}

if ($_POST) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $abreviatura = $_POST['abreviatura'];

    $sql = "UPDATE unidad_medida SET nombre='$nombre', abreviatura='$abreviatura' WHERE IDUnidad = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_unidad.php");
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
    <title>Editar Unidad de Medida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Unidad de Medida</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['IDUnidad']; ?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
        <label>Abreviatura:</label><br>
        <input type="text" name="abreviatura" value="<?php echo $row['abreviatura']; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_unidad.php">Volver a la Lista</a>
</body>
</html>
