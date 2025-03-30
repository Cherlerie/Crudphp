<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM almacen WHERE IDAlmacen = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_almacen.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
}
?>
