
<!--<div>
<h2>Iniciar Sesión</h2>
<form action="./index.php?controller=UserController&action=inicioSesion" method="post">
    <label for="user">Usuario:</label>
    <input type="text" name="user" id="user"><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" id="contrasena"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
<a href="./index.php?controller=UserController&action=registrar">Registrar</a>
</div>-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <br>
    <title>Iniciar Sesión</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="./index.php?controller=UserController&action=inicioSesion" method="post">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" class="form-control" name="user" id="user">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <br>
            <button type="submit" class="btn btn-secondary">Iniciar Sesión</button>
        </form>
        <a href="./index.php?controller=UserController&action=registrar" class="btn btn-link">Registrar</a>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (opcional, solo si necesitas funcionalidades de JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

   