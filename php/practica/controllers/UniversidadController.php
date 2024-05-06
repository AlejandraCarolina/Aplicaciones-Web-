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
            $id = $_POST['id_universidad'];
            $nombre = $_POST['nombre'];
    
            if ($this->model->actualizarUniversidad($id, $nombre)) {
                echo "Universidad actualizada correctamente";
                header('Location: ./index.php?controller=UniversidadController&action=index');
            } 
        } else {
            $id = $_GET['id'];
            $universidad = $this->model->obtenerUniversidadPorId($id);
            include './views/Universidad/editar.php';
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->model->eliminarUniversidad($id);
        header('Location: ./index.php?controller=UniversidadController&action=index');
        
    }
        
    

}

?>