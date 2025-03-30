<?php
require_once "../Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCompra = $_POST['idCompra'];
    $idProveedor = $_POST['proveedor'];
    $fecha = $_POST['fecha'];
    $factura = $_POST['factura'];
    $monto_total = $_POST['monto_total'];

    $sql = "UPDATE compra SET IDProveedor = ?, fecha_compra = ?, numero_factura = ?, monto_total = ? WHERE IDCompra = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("issdi", $idProveedor, $fecha, $factura, $monto_total, $idCompra);
        if ($stmt->execute()) {
            header("Location: Index_Compra.php");
            exit();
        } else {
            echo "Error al actualizar la compra: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idCompra = $_GET['id'];
        $sql = "SELECT * FROM compra WHERE IDCompra = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $idCompra);
            $stmt->execute();
            $result = $stmt->get_result();
            $compra = $result->fetch_assoc();

            if (!$compra) {
                echo "Compra no encontrada.";
                exit();
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
            exit();
        }
    } else {
        echo "ID no válido.";
        exit();
    }
}

$proveedores = $conn->query("SELECT IDProveedor, nombre FROM proveedor");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Compra</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Compra</h1>
    <form method="POST">
        <input type="hidden" name="idCompra" value="<?php echo htmlspecialchars($compra['IDCompra']); ?>">
        <label for="proveedor">Proveedor:</label>
        <select name="proveedor" id="proveedor" required>
            <?php while ($proveedor = $proveedores->fetch_assoc()): ?>
                <option value="<?php echo $proveedor['IDProveedor']; ?>" <?php echo $proveedor['IDProveedor'] == $compra['IDProveedor'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($proveedor['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($compra['fecha_compra']); ?>" required>
        <br>
        <label for="factura">Número de Factura:</label>
        <input type="text" id="factura" name="factura" value="<?php echo htmlspecialchars($compra['numero_factura']); ?>" required>
        <br>
        <label for="monto_total">Monto Total:</label>
        <input type="number" id="monto_total" name="monto_total" value="<?php echo htmlspecialchars($compra['monto_total']); ?>" step="0.01" required>
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="Index_Compra.php">Volver a la lista</a>
</body>
</html>