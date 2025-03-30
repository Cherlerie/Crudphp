<?php
require_once "../Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProveedor = $_POST['proveedor'];
    $fecha = $_POST['fecha'];
    $factura = $_POST['factura'];
    $fechaEstimadaEntrega = $_POST['fecha_estimada_entrega'];
    $estadoCompra = $_POST['estado_compra'];
    $validacion = $_POST['validacion']; 
    $idTipoPago = $_POST['tipo_pago']; 
    $productos = $_POST['producto'];
    $cantidades = $_POST['cantidad'];
    $unidades = $_POST['unidad']; 

    $monto_total = 0;

    foreach ($productos as $index => $idProducto) {
        $cantidad = $cantidades[$index];
        $sqlPrecio = "SELECT precio_unitario FROM producto WHERE IDProducto = ?";
        $stmtPrecio = $conn->prepare($sqlPrecio);
        $stmtPrecio->bind_param("i", $idProducto);
        $stmtPrecio->execute();
        $resultPrecio = $stmtPrecio->get_result();
        $rowPrecio = $resultPrecio->fetch_assoc();
        $precio = $rowPrecio['precio_unitario'];
        $total = $precio * $cantidad;
        $monto_total += $total;
        $stmtPrecio->close();
    }

    $sqlCompra = "INSERT INTO compra (IDProveedor, fecha_compra, numero_factura, monto_total, fecha_estimada_entrega, estado_compra, validacion, IDTipoPago) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtCompra = $conn->prepare($sqlCompra);
    $stmtCompra->bind_param("issdssii", $idProveedor, $fecha, $factura, $monto_total, $fechaEstimadaEntrega, $estadoCompra, $validacion, $idTipoPago);
    $stmtCompra->execute();
    $idCompra = $stmtCompra->insert_id;
    $stmtCompra->close();

    foreach ($productos as $index => $idProducto) {
        $cantidad = $cantidades[$index];
        $idUnidad = $unidades[$index]; 
        $sqlPrecio = "SELECT precio_unitario FROM producto WHERE IDProducto = ?";
        $stmtPrecio = $conn->prepare($sqlPrecio);
        $stmtPrecio->bind_param("i", $idProducto);
        $stmtPrecio->execute();
        $resultPrecio = $stmtPrecio->get_result();
        $rowPrecio = $resultPrecio->fetch_assoc();
        $precio = $rowPrecio['precio_unitario'];
        $stmtPrecio->close();

        $sqlDetalle = "INSERT INTO detalle_compra (IDCompra, IDProducto, IDUnidad, cantidad, costo_unitario) 
                       VALUES (?, ?, ?, ?, ?)";
        $stmtDetalle = $conn->prepare($sqlDetalle);
        $stmtDetalle->bind_param("iiidd", $idCompra, $idProducto, $idUnidad, $cantidad, $precio);
        $stmtDetalle->execute();
        $stmtDetalle->close();
    }

    header("Location: index_compra.php");
    exit();
}


$proveedores = $conn->query("SELECT IDProveedor, nombre FROM proveedor");
$productos = $conn->query("SELECT IDProducto, descripcion FROM producto");
$tiposPago = $conn->query("SELECT IDTipoPago, nombre FROM tipo_pago");
$unidades = $conn->query("SELECT IDUnidad, nombre FROM unidad_medida"); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Compra</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Registrar Nueva Compra</h1>
    <form method="POST">
        <label>Proveedor:</label>
        <select name="proveedor" required>
            <?php while ($prov = $proveedores->fetch_assoc()): ?>
                <option value="<?php echo $prov['IDProveedor']; ?>"><?php echo $prov['nombre']; ?></option>
            <?php endwhile; ?>
        </select>

        <label>Fecha de Compra:</label>
        <input type="datetime-local" name="fecha" required>

        <label>Número de Factura:</label>
        <input type="text" name="factura" required>

        <label>Fecha Estimada de Entrega:</label>
        <input type="datetime-local" name="fecha_estimada_entrega" required>

        <label>Tipo de Pago:</label>
        <select name="tipo_pago" required>
            <?php while ($tipo = $tiposPago->fetch_assoc()): ?>
                <option value="<?php echo $tipo['IDTipoPago']; ?>"><?php echo $tipo['nombre']; ?></option>
            <?php endwhile; ?>
        </select>

        <label>Estado de la Compra:</label>
        <select name="estado_compra" required>
            <option value="pendiente">Pendiente</option>
            <option value="en_transito">En tránsito</option>
            <option value="entregada">Entregada</option>
            <option value="cancelada">Cancelada</option>
        </select>

        <label>Validación:</label>
        <select name="validacion" required>
            <option value="0">No Validado</option>
            <option value="1">Validado</option>
        </select>

        <h3>Detalles de la Compra</h3>
        <div id="productos">
            <label>Producto:</label>
            <select name="producto[]" required>
                <?php while ($prod = $productos->fetch_assoc()): ?>
                    <option value="<?php echo $prod['IDProducto']; ?>"><?php echo $prod['descripcion']; ?></option>
                <?php endwhile; ?>
            </select>
            <label>Cantidad:</label>
            <input type="number" name="cantidad[]" min="1" required>
            <label>Unidad:</label>
            <select name="unidad[]" required>
                <?php while ($unidad = $unidades->fetch_assoc()): ?>
                    <option value="<?php echo $unidad['IDUnidad']; ?>"><?php echo $unidad['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="button" onclick="agregarProducto()">Agregar Otro Producto</button>

        <input type="submit" value="Registrar Compra">
    </form>

    <script>
        function agregarProducto() {
            const div = document.getElementById("productos");
            const clone = div.cloneNode(true);
            div.parentNode.insertBefore(clone, div.nextSibling);
        }
    </script>
</body>
</html>