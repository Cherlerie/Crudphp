<?php
require_once "../Conexion.php";
$id = $_GET['id'];

$sql = "DELETE FROM tipo_pago WHERE IDTipoPago=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index_tipopago.php");
exit();
?>
