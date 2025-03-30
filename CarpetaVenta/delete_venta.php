<?php
require_once "../conexion.php";

if (!isset($_GET['id'])) {
    exit("Error: ID de venta no proporcionado.");
}

$IDVenta = $_GET['id'];

$sqlDetalles = "DELETE FROM detalle_venta WHERE IDVenta = ?";
$stmtDetalles = $conn->prepare($sqlDetalles);
$stmtDetalles->bind_param("i", $IDVenta);
$stmtDetalles->execute();

$sqlVenta = "DELETE FROM ventas WHERE IDVenta = ?";
$stmtVenta = $conn->prepare($sqlVenta);
$stmtVenta->bind_param("i", $IDVenta);

if ($stmtVenta->execute()) {
    header("Location: index_ventas.php");
    exit();
} else {
    echo "Error al eliminar la venta: " . $conn->error;
}

$stmtDetalles->close();
$stmtVenta->close();
$conn->close();
?>
