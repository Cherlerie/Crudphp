<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacto WHERE IDContacto = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: No se encontró el contacto con ID $id.";
        exit();
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
    exit();
}

if ($_POST) {
    $id = $_POST['id'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $idProveedor = $_POST['IDProveedor'];

    $sql = "UPDATE contacto SET telefono='$telefono', correo='$correo', IDProveedor=$idProveedor WHERE IDContacto = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_contacto.php");
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
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['IDContacto']; ?>">
        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required><br>
        <label>Correo:</label><br>
        <input type="email" name="correo" value="<?php echo $row['correo']; ?>" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" value="<?php echo $row['IDProveedor']; ?>" required><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index_contacto.php">Volver a la Lista</a>
</body>
</html>