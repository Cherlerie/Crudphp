<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM historial WHERE IDHistorial = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_historial.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Error: No se puso un ID válido.";
}
?>
