<?php
require_once "../Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE tipo_cliente SET nombre=? WHERE IDTipoCliente=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $nombre, $id);
        if ($stmt->execute()) {
            header("Location: Index_TipoCliente.php");
            exit();
        } else {
            echo "Error al actualizar el tipo de cliente.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tipo_cliente WHERE IDTipoCliente=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $tipoCliente = $result->fetch_assoc();

            if (!$tipoCliente) {
                echo "Tipo de cliente no encontrado.";
                exit();
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta.";
            exit();
        }
    } else {
        echo "ID no válido.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tipo de Cliente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Tipo de Cliente</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($tipoCliente['IDTipoCliente']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($tipoCliente['nombre']); ?>" required>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="index_tipocliente.php">Volver a la lista</a>
</body>
</html>