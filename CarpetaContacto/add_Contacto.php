<?php
include 'ConexionContacto.php';

if ($_POST) {
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $idProveedor = $_POST['IDProveedor'];

    $sql = "INSERT INTO contacto (telefono, correo, IDProveedor) VALUES ('$telefono', '$correo', $idProveedor)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_contacto.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connContacto->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Agregar Nuevo Contacto</h1>
    <form method="post">
        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br>
        <label>Correo:</label><br>
        <input type="email" name="correo" required><br>
        <label>ID Proveedor:</label><br>
        <input type="number" name="IDProveedor" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <a href="index_contacto.php">Volver a la Lista</a>
</body>
</html>
