<?php
require_once "../conexion.php";


$clientes = $conn->query("SELECT IDCliente, nombre FROM cliente");
$productos = $conn->query("SELECT IDProducto, nombre, precio FROM producto");

if ($_POST) {
    $IDCliente = $_POST['IDCliente'];
    $IDTipoPago = $_POST['IDTipoPago'];
    $numero_factura = $_POST['numero_factura'];
    $condicion_pago = $_POST['condicion_pago'];
    $fecha_estimada_entrega = $_POST['fecha_estimada_entrega'];
    $observaciones = $_POST['observaciones'];

  
    $sql = "INSERT INTO ventas (IDCliente, monto_total, IDTipoPago, numero_factura, condicion_pago, fecha_estimada_entrega, estado_venta, observaciones) 
            VALUES ('$IDCliente', 0, '$IDTipoPago', '$numero_factura', '$condicion_pago', '$fecha_estimada_entrega', 'Pendiente', '$observaciones')";
    
    if ($conn->query($sql) === TRUE) {
        $IDVenta = $conn->insert_id;
        $monto_total = 0;

        
        foreach ($_POST['productos'] as $index => $IDProducto) {
            $cantidad = $_POST['cantidades'][$index];
            $precio_unitario = $_POST['precios'][$index];
            $monto_total += $cantidad * $precio_unitario;

            $sqlDetalle = "INSERT INTO detalle_venta (IDVenta, IDProducto, cantidad, precio_unitario) 
                           VALUES ('$IDVenta', '$IDProducto', '$cantidad', '$precio_unitario')";
            $conn->query($sqlDetalle);
        }

       
        $conn->query("UPDATE ventas SET monto_total='$monto_total' WHERE IDVenta='$IDVenta'");

        header("Location: index_ventas.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Registrar Venta</h1>
    <form method="post">
        <label>Cliente:</label>
        <select name="IDCliente" required>
            <?php while ($c = $clientes->fetch_assoc()) { ?>
                <option value="<?php echo $c['IDCliente']; ?>"><?php echo $c['nombre']; ?></option>
            <?php } ?>
        </select><br>
        <label>Número de Factura:</label><br>
        <input type="text" name="numero_factura" required><br>

        <label>Productos:</label><br>
        <div id="productos">
            <select name="productos[]" required>
                <?php while ($p = $productos->fetch_assoc()) { ?>
                    <option value="<?php echo $p['IDProducto']; ?>" data-precio="<?php echo $p['precio']; ?>">
                        <?php echo $p['nombre']; ?> - $<?php echo $p['precio']; ?>
                    </option>
                <?php } ?>
            </select>
            <input type="number" name="cantidades[]" min="1" required>
            <input type="hidden" name="precios[]" value="">
            <br>
        </div>
        
        <button type="button" onclick="agregarProducto()">Agregar Otro Producto</button>
        <br><br>
        <input type="submit" value="Guardar Venta">
    </form>
    <a href="index_ventas.php">Volver a la Lista</a>

    <script>
        function agregarProducto() {
            let div = document.getElementById('productos').cloneNode(true);
            document.body.appendChild(div);
        }
    </script>
</body>
</html>
