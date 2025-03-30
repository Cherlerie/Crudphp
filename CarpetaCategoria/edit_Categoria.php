<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql    = "SELECT * FROM categoria WHERE IDCategoria = $id";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
}

if ($_POST) {
    $id          = $_POST['id'];
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE IDCategoria = $id";
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
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Editar Categoría</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['IDCategoria']; ?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br><br>
        <label>Descripción:</label><br>
        <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="index_categoria.php">Volver a la Lista</a>
</body>
</html>
