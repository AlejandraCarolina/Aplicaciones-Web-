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
    <title>Lista de Carreras</title>
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
        <br>
        <h2>Carreras</h2>

        <a href="./index.php?controller=CarreraController&action=agregar" class="btn btn-primary">Agregar Carrera</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID_CARRERA</th>
                    <th>NOMBRE</th>
                    <th>UNIVERSIDAD</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($carreras as $carrera): ?>
                <tr>
                    <td><?php echo $carrera['id_carrera']; ?></td>
                    <td><?php echo $carrera['nombre']; ?></td>
                    <td><?php echo $carrera['universidad']; ?></td>
                    <td>
                        <a href="./index.php?controller=CarreraController&action=editar&id=<?php echo $carrera['id_carrera']; ?>" class="btn btn-info">Editar</a>
                        <a href="./index.php?controller=CarreraController&action=eliminar&id=<?php echo $carrera['id_carrera']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
