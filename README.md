//Factura de Compra

Aplicacion web sencilla hecha en PHP que emite la factura correspondiente a la compra de unidades de un articulo. Para el diseno se usa Bootstrap por CDN.

//Funcionamiento

1. El usuario ingresa la *descripcion del articulo, la cantidad adquirida y el precio unitario de venta**.
2. Al presionar "Emitir factura", el formulario se envia por POST al mismo archivo (index.php).
3. El programa realiza los siguientes calculos:
   - Precio bruto = cantidad x precio unitario
   - IVA (12%) = precio bruto x 0.12
   - Precio total de venta = precio bruto + IVA
   - Descuento: si el precio total de venta supera los 150 $, se aplica un descuento del 15% sobre ese total
   - Monto total a pagar = precio total de venta - descuento
4. Se muestra en pantalla el desglose de la factura:
   - Descripcion del articulo y cantidad
   - Subtotal (precio bruto)
   - Valor del IVA
   - Mensaje indicando si aplica o no el descuento (y el monto descontado)
   - Monto total a pagar

