<?php
require_once "../Conexion.php";
$id = $_GET['id'];

$sqlDetalle = "DELETE FROM detalle_compra WHERE IDCompra = ?";
$stmtDetalle = $conn->prepare($sqlDetalle);
$stmtDetalle->execute([$id]);

$sqlCompra = "DELETE FROM compra WHERE IDCompra = ?";
$stmtCompra = $conn->prepare($sqlCompra);
$stmtCompra->execute([$id]);

header("Location: index_compra.php");
exit();
?>
