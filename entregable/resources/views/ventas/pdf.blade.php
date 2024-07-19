<!-- resources/views/ventas/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Venta PDF</title>
    <style>
        /* Estilos personalizados para el PDF */
    </style>
</head>
<body>
    <h1>Venta #{{ $venta->id_venta}}</h1>
    <p>Producto: {{ $venta->producto->nombre }}</p>
    <p>Categoría: {{ $venta->categoria->nombre }}</p>
    <p>Cliente: {{ $venta->cliente->nombre }}</p>
    <p>Fecha de Venta: {{ $venta->fecha_venta }}</p>
    <p>Subtotal: ${{ $venta->subtotal }}</p>
    <p>IVA: ${{ $venta->iva }}</p>
    <p>Total: ${{ $venta->total }}</p>
</body>
</html>
