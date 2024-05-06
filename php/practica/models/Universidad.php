<?php

require_once 'Conexion.php';

class Universidad {

   
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerUniversidad(){
        $query = "SELECT * FROM universidad";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function agregarUniversidad($nombre){
        $query = "INSERT INTO universidad (nombre) VALUES ('$nombre')";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado;
    }

    public function obtenerUniversidadPorId($id){
        $query = "SELECT * FROM universidad WHERE id_uni = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_assoc();
    }

    public function actualizarUniversidad($id, $nombre){
        $query = "UPDATE universidad SET nombre = '$nombre' WHERE id_uni = '$id'";
        return $this->conexion->conectar()->query($query);
    }

    public function eliminarUniversidad($id){
        $query = "DELETE FROM universidad WHERE id_uni = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado;
    }




}

?>