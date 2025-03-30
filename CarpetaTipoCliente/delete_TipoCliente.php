<?php
require_once "../Conexion.php";
$id = $_GET['id'];

$sql = "DELETE FROM tipo_cliente WHERE IDTipoCliente=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index_tipocliente.php");
exit();
?>
