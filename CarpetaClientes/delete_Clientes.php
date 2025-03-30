<?php
require_once "../Conexion.php";
$id = $_GET['id'];

$sql = "DELETE FROM cliente WHERE IDCliente=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index_clientes.php");
exit();
?>
