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
    <title>Agregar Carrera</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
        <h2>Agregar Carrera</h2>

        <form method="post" action="./index.php?controller=CarreraController&action=agregar">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="Universidad" class="form-label">Universidad:</label>
                <select class="form-select" name="id_universidad" required>
                    <option value="">Seleccione una universidad</option>
                    <?php 
                    include './models/Universidad.php';
                    $uni = new Universidad();
                    $universidades = $uni->obtenerUniversidad();  
                    foreach ($universidades as $universidad): ?>
                        <option value="<?php echo $universidad['id_uni']; ?>"><?php echo $universidad['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
