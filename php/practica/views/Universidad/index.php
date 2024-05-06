<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>

<ul>
    <li>
        <a href="./index.php?controller=UniversidadController&action=index">Universidad</a>
    </li>
    <li>
         <a href="./index.php?controller=CarreraController&action=index">Carrera</a>
    </li>
    <li>
        <a href="./index.php?controller=UserController&action=cerrarSesion">Cerrar Sesión</a>
    </li>
</ul>

<div>
    <h2>Universidad</h2>

    <a href="./index.php?controller=UniversidadController&action=agregar">Agregar Universidad</a>

    <table>
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