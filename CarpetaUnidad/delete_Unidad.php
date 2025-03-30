<?php
require_once "../conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM unidad_medida WHERE IDUnidad = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_unidad.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Error: No se proporcionó un ID válido.";
}
?>
