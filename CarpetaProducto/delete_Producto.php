<?php
include 'ConexionProducto.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM producto WHERE IDProducto = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_producto.php");
        exit();
    } else {
        echo "Error al eliminar: " . $connProducto->error;
    }
}
?>
