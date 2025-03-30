<?php
require_once "../conexion.php";

if ($_POST) {
    echo "llegue al post...";
    $nombre = $_POST['Nombre'];
    $id = $_POST['id'];
    $aprobado = $_POST['aprobado'];
    $precio = $_POST['precio'];
    $idProveedor = $_POST['IDProveedor'];

    $sql = "UPDATE articulo SET Nombre='$nombre', aprobado='$aprobado', precio=$precio, IDProveedor=$idProveedor WHERE IDArticulo = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_articulo.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articulo WHERE IDArticulo = $id";
    $result = $conn->query($sql);
}
    while ($row = $result->fetch_assoc()) { 
        echo $row['Nombre'];
    
/*
    if ($result === TRUE) {
    $row = $result->fetch_assoc();
    }else{
        echo "Sin Datos.";
    }

    echo $row['nombre'];*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Artículo</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Editar Artículo</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['IDArticulo']; ?>">
        <label>Nombre:</label><br>
        <input type="text" name="Nombre" value="<?php echo $row['Nombre'];?>"><br>
        <label>Aprobado:</label><br>
        <select name="aprobado" required>
            <option value="Si" <?php echo ($row['aprobado'] == 'Si') ? 'selected' : ''; ?>>Si</option>
            <option value="No" <?php echo ($row['aprobado'] == 'No') ? 'selected' : ''; ?>>No</option>
        </select><br>
        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" value="<?php echo $row['precio']; ?>" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" value="<?php echo $row['IDProveedor']; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <?php }?>
    <a href="index_articulo.php">Volver a la Lista</a>
</body>
</html>
