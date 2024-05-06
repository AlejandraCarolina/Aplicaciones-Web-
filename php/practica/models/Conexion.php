<?php

class Conexion {

    //variables para la conexión a la bd

    private $host = "localhost";
    private $user = "root";
    private $password = ""; 
    private $database = "practica";


    public function conectar() {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>