<!-- resources/views/compras/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Compra PDF</title>
    <style>
        /* Estilos personalizados para el PDF */
    </style>
</head>
<body>
    <h1>Compra #{{ $compra->id_compra }}</h1>
    <p>Proveedor: {{ $compra->proveedor->nombre }}</p>
    <p>Producto: {{ $compra->producto->nombre }}</p>
    <p>Cantidad: {{ $compra->cantidad }}</p>
    <p>Precio: ${{ $compra->precio }}</p>
    <p>Fecha de Compra: {{ $compra->fecha_compra }}</p>
    <p>Descuento: ${{ $compra->descuento }}</p>
</body>
</html>
