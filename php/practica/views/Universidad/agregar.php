<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>


<div>
    <h2>Agregar</h2>

    <form method="post" action="./index.php?controller=UniversidadController&action=agregar">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
</div>