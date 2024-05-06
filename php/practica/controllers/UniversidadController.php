<?php

require_once __DIR__ . '/../models/Universidad.php';

class UniversidadController {
    private $model;

    public function __construct() {
        $this->model = new Universidad();
    }

    public function index() {
        $universidades = $this->model->obtenerUniversidad();
        include './views/Universidad/index.php';
    }

    public function agregar() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];
    
            if ($this->model->agregarUniversidad($nombre)) {
                echo "Universidad agregada correctamente";
                header('Location: ./index.php?controller=UniversidadController&action=index');
            }
        } else {
            include  './views/Universidad/agregar.php';
        }
    }

    public function editar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Obtiene los datos del formulario
            $id = $_POST['id_universidad'];
            $nombre = $_POST['nombre'];

            // Actualiza la universidad en la base de datos
    
            if ($this->model->actualizarUniversidad($id, $nombre)) {
                echo "Universidad actualizada correctamente";
                header('Location: ./index.php?controller=UniversidadController&action=index');
            } 
        } else {
            // Obtiene el ID de la universidad desde el parámetro GET
            $id = $_GET['id'];
            // Obtiene los datos de la universidad para editar
            $universidad = $this->model->obtenerUniversidadPorId($id);
            include './views/Universidad/editar.php';
        }
    }

    //  Método para eliminar una universidad
    public function eliminar() {
        // Obtiene el ID de la universidad desde el parámetro GET
        $id = $_GET['id'];

        // Elimina la universidad de la base de datos
        $this->model->eliminarUniversidad($id);
        header('Location: ./index.php?controller=UniversidadController&action=index');
        
    }
        
    

}

?>