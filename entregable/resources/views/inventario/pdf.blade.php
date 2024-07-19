<!-- resources/views/inventario/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Inventario PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Detalles del Inventario</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $inventario->id_inventario }}</td>
        </tr>
        <tr>
            <th>Producto</th>
            <td>{{ $inventario->producto->nombre }}</td>
        </tr>
        <tr>
            <th>Movimiento</th>
            <td>{{ $inventario->movimiento }}</td>
        </tr>
        <tr>
            <th>Cantidad</th>
            <td>{{ $inventario->cantidad }}</td>
        </tr>
        <tr>
            <th>Fecha de Entrada</th>
            <td>{{ $inventario->fecha_entrada }}</td>
        </tr>
        <tr>
            <th>Fecha de Salida</th>
            <td>{{ $inventario->fecha_salida }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $inventario->descripcion }}</td>
        </tr>
    </table>
</body>
</html>
