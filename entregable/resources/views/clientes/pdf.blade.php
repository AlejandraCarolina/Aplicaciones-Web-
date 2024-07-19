<!DOCTYPE html>
<html>
<head>
    <title>Cliente PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .cliente-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Información del Cliente</h1>
    <div class="cliente-info">
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Apellidos:</strong> {{ $cliente->apellidos }}</p>
        <p><strong>Correo:</strong> {{ $cliente->correo }}</p>
        <p><strong>Código Postal:</strong> {{ $cliente->codigo_postal }}</p>
        <p><strong>Regimén Fiscal:</strong> {{ $cliente->regimen_fiscal }}</p>
        <p><strong>Razón Social:</strong> {{ $cliente->razon_social }}</p>
        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
        <p><strong>RFC:</strong> {{ $cliente->rfc }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    </div>
</body>
</html>
