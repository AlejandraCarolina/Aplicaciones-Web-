<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <br>
    <title>Registrar</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
        <h2>Registrar</h2>
        <form action="./index.php?controller=UserController&action=registrar" method="post">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" class="form-control" name="user" id="user">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <br>
            <button type="submit" class="btn btn-secondary">Registrar</button>
        </form>
        
        <a href="./index.php?controller=UserController&action=inicioSesion" class="btn btn-link">Iniciar Sesión</a>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (opcional, solo si necesitas funcionalidades de JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
