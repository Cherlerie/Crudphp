<?php
require_once "../conexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM proveedor WHERE IDProveedor = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_proveedor.php");
        exit();
    } else {
        echo "Error al eliminar: " . $sql . "<br>" . $conn->error;
    }
}
?>
