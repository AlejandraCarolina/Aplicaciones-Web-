<?php

class Conexion {

    //variables para la conexión a la bd

    private $host = "159.203.72.44";
    private $user = "admin";
    private $password = "46423cde20ef51b70b6b07471fb9c85c77a84ca69147f4df"; 
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