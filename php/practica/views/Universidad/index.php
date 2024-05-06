<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.php?controller=UniversidadController&action=index">Universidad</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?controller=CarreraController&action=index">Carrera</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php?controller=UserController&action=cerrarSesion">Cerrar Sesión</a>
        </li>
    </ul>

    <div class="container">
        <h2>Universidad</h2>

        <a href="./index.php?controller=UniversidadController&action=agregar" class="btn btn-primary">Agregar Universidad</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID_UNIVERSIDAD</th>
                    <th>NOMBRE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($universidades as $uni): ?>
                <tr>
                    <td><?php echo $uni['id_uni']; ?></td>
                    <td><?php echo $uni['nombre']; ?></td>
                    <td>
                        <a href="./index.php?controller=UniversidadController&action=editar&id=<?php echo $uni['id_uni']; ?>" class="btn btn-warning">Editar</a>
                        <a href="./index.php?controller=UniversidadController&action=eliminar&id=<?php echo $uni['id_uni']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
