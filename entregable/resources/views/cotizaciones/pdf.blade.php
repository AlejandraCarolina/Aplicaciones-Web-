<!-- resources/views/cotizaciones/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Cotización PDF</title>
    <style>
        /* Estilos personalizados para el PDF */
    </style>
</head>
<body>
    <h1>Cotización #{{ $cotizacion->id_cotizacion}}</h1>
    <p>Producto: {{ $cotizacion->producto->nombre }}</p>
    <p>Cliente: {{ $cotizacion->cliente->nombre }}</p>
    <p>Fecha de Cotización: {{ $cotizacion->fecha_cot }}</p>
    <p>Vigencia: {{ $cotizacion->vigencia }}</p>
    <p>Cantidad: {{ $cotizacion->cantidad }}</p>
    <p>Comentarios: {{ $cotizacion->comentarios }}</p>
</body>
</html>
