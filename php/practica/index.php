<?php
        if (isset($_GET['controller']) && isset($_GET['action'])) {
                
            $controller = $_GET['controller'];
            $action = $_GET['action'];
            require_once "controllers/$controller.php";
            $controller = new $controller();
            $controller->$action();
            
        } else {
            require_once "controllers/UserController.php";
            $UsuarioController = new UserController();
            $UsuarioController->index();
        }

?>