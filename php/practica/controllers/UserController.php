<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    //Método constructor para inicializar el modelo User.
    
    public function __construct() {
        $this->model = new User();
    }

    //Método para mostrar la página de inicio de sesión.
    public function index() {
        require_once __DIR__ . '/../views/InicioSesion/index.php';
    }

    //Muestra el formulario de registro si no se proporcionan datos de usuario, de lo contrario registra al usuario.
    public function registrar() {
        
        if(!isset($_POST['user']) || !isset($_POST['contrasena'])){
            require_once __DIR__ . '/../views/Registro/index.php';
        } else {
            $usuario = $_POST['user'];
            $password = $_POST['contrasena'];
    
            if ($this->model->registrar($usuario, $password)) {
                echo "Regisrtado correctamente";
                header('Location: ./index.php?controller=UserController&action=inicioSesion');
            } else {
                echo "Error al registrar el usuario";
            }
        }
       
    }

    //Muestra el formulario de inicio de sesión si no se proporcionan datos de usuario, de lo contrario inicia sesión al usuario.
     
    public function inicioSesion() {

        if(!isset($_POST['user']) || !isset($_POST['contrasena'])){
            require_once __DIR__ . '/../views/InicioSesion/index.php';
        } else {
            $usuario = $_POST['user'];
            $password = $_POST['contrasena'];
    
            if ($this->model->login($usuario, $password)) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: ./index.php?controller=UniversidadController&action=index');
                exit();
            }
        }
       
    }

     
    //Método para cerrar sesión de usuarios.
    //Destruye la sesión y redirige al usuario a la página de inicio de sesión.
    
    public function cerrarSesion() {
        session_start();
        session_destroy();
        header('Location: ./index.php?controller=UserController&action=index');
        exit(); 
    }
}

?>
