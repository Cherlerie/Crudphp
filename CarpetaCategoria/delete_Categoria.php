<?php
require_once "../conexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM categoria WHERE IDCategoria = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index_categoria.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
