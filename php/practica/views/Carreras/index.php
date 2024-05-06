<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ./index.php?controller=UserController&action=index');
    exit();
}
?>

<ul>
    <li>
        <a  href="./index.php?controller=UniversidadController&action=index">Universidad</a>
    </li>
    <li>
         <a  href="./index.php?controller=CarreraController&action=index">Carrera</a>
    </li>
    <li>
        <a href="./index.php?controller=UserController&action=cerrarSesion">Cerrar Sesión</a>
    </li>
</ul>



    <h2>Carreras</h2>

    <a href="./index.php?controller=CarreraController&action=agregar" >Agregar Carrera</a>

    <table>
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
                    <a href="./index.php?controller=CarreraController&action=editar&id=<?php echo $carrera['id_carrera']; ?>" >Editar</a>
                    <a href="./index.php?controller=CarreraController&action=eliminar&id=<?php echo $carrera['id_carrera']; ?>" >Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
