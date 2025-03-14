<?php
include 'ConexionContacto.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contacto WHERE IDContacto = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_contacto.php");
        exit();
    } else {
        echo "Error al eliminar: " . $connContacto->error;
    }
}
?>
