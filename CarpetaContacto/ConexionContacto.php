<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "suministros";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
