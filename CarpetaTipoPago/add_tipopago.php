<?php
require_once "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO tipo_pago (nombre) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre]);

    header("Location: index_tipopago.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tipo de Pago</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Tipo de Pago</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre del tipo de pago" required>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
