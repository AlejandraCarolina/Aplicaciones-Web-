<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>
<div>
    <h2>Agregar</h2>

    <form method="post" action="./index.php?controller=CarreraController&action=agregar">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <label for="Universidad">Universidad:</label>
            <select name="id_universidad" required>
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
        <button type="submit">Guardar</button>
    </form>
</div>