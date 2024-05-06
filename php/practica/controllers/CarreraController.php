<?php

require_once __DIR__ . '/../models/Carrera.php';


class CarreraController {
    private $model;

    public function __construct() {
        $this->model = new Carrera();
    }

    public function index() {
        $carreras = $this->model->obtenerCarrera();
        include_once './views/Carreras/index.php';
    }

    public function agregar() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];
            $id_universidad = $_POST['id_universidad'];
    
            if ($this->model->agregarCarrera($nombre, $id_universidad)) {
                echo "Carrera agregada correctamente";
                header('Location: ./index.php?controller=CarreraController&action=index');
            }
        } else {
            include  './views/Carreras/agregar.php';
        }
    }

    //MÉTODO PARA EDITAR LA CARRERA, VARIABLES DE LA BD 
    public function editar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id_carrera'];
            $nombre = $_POST['nombre'];
            $id_universidad = $_POST['id_universidad'];

            //Agregar carrera a la bd
    
            if ($this->model->actualizarCarrera($id, $nombre, $id_universidad)) {
                echo "Carrera actualizada correctamente";
                header('Location: ./index.php?controller=CarreraController&action=index');
            } 
        } else {
            $id = $_GET['id'];
            $carrera = $this->model->obtenerCarreraPorId($id);
            include './views/Carreras/editar.php';
        }
    }

    //MÉTODO PARA ELIMINAR LA CARRERA

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminarCarrera($id)) {
            echo "Carrera eliminada correctamente";
            header('Location: ./index.php?controller=CarreraController&action=index');
        } 
    }

}

?>