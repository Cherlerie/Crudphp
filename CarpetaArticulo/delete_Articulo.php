<?php
include 'ConexionArticulo.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM articulo WHERE IDArticulo = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_articulo.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>
