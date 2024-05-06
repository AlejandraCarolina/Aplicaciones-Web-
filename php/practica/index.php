<?php

// Verifica si se han proporcionado los parámetros controller y action a través de la URL

        if (isset($_GET['controller']) && isset($_GET['action'])) {
                
            $controller = $_GET['controller'];
            $action = $_GET['action'];

            // Incluye dinámicamente el archivo del controlador correspondiente
            require_once "controllers/$controller.php";
            $controller = new $controller();
            $controller->$action();
            
        } else {

            // Si no se proporcionan controller y action, se redirige al controlador UserController
            // Incluye dinámicamente el archivo del controlador UserController
            require_once "controllers/UserController.php";
            $UsuarioController = new UserController();
            $UsuarioController->index();
        }

?>