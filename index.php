<?php
// Variable para saber si ya se envió el formulario
$procesado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $procesado = true;

    // Datos del formulario
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio_unitario = $_POST["precio_unitario"];

    // Precio bruto
    $precio_bruto = $cantidad * $precio_unitario;

    // IVA del 12%
    $iva = $precio_bruto * 0.12;

    // Precio total de venta
    $precio_total = $precio_bruto + $iva;

    // Descuento del 15% si el total supera 150 $
    if ($precio_total > 150) {
        $descuento = $precio_total * 0.15;
        $mensaje = "Aplica descuento del 15%";
    } else {
        $descuento = 0;
        $mensaje = "No aplica descuento";
    }

    // Monto total a pagar
    $total_pagar = $precio_total - $descuento;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factura de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 mb-4">
        <h1 class="mb-4">Factura de Compra</h1>

        <form method="post" action="index.php">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del artículo</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad adquirida</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio unitario ($)</label>
                <input type="number" step="0.01" class="form-control" id="precio_unitario" name="precio_unitario">
            </div>

            <button type="submit" class="btn btn-primary">Emitir factura</button>
        </form>

        <?php if ($procesado) { ?>
            <hr>
            <h4>Factura</h4>
            <p><strong>Artículo:</strong> <?php echo $descripcion; ?></p>
            <p><strong>Cantidad:</strong> <?php echo $cantidad; ?></p>
            <p><strong>Subtotal (precio bruto):</strong> <?php echo number_format($precio_bruto, 2); ?> $</p>
            <p><strong>IVA (12%):</strong> <?php echo number_format($iva, 2); ?> $</p>
            <p><strong>Precio total de venta:</strong> <?php echo number_format($precio_total, 2); ?> $</p>
            <p><strong>Descuento:</strong> <?php echo $mensaje; ?><?php if ($descuento > 0) { ?> (<?php echo number_format($descuento, 2); ?> $)<?php } ?></p>
            <p><strong>Monto total a pagar:</strong> <?php echo number_format($total_pagar, 2); ?> $</p>
        <?php } ?>
    </div>
</body>
</html>
