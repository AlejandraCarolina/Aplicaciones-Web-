<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>
<div>
    <h2>Editar</h2>

    <form method="post" action="./index.php?controller=CarreraController&action=editar">
        <input type="hidden" name="id_carrera" value="<?php echo $carrera['id_carrera']; ?>">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $carrera["nombre"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="Universidad">Universidad:</label>
            <select name="id_universidad" required>
                <option value="">Seleccione una universidad</option>
                <?php 
                include './models/Universidad.php';
                $uni = new Universidad();
                $universidades = $uni->obtenerUniversidad();  
                foreach ($universidades as $universidad): ?>
                    <option value="<?php echo $universidad['id_uni'];?>" <?php if($universidad['nombre'] == $carrera['universidad']){ echo "selected";}?>><?php echo $universidad['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Guardar</button>
    </form>
</div>