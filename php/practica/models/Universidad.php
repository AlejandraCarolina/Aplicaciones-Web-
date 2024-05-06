<?php

require_once 'Conexion.php';

class Universidad {

   
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    // método para obtener la universidad 
    // retorna un array con los datos de las universidades
    public function obtenerUniversidad(){
        $query = "SELECT * FROM universidad";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    //agregar universidad 
    //recibe como parámetro el nombre de la universidad
    //retornar el resultado de la consulta
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

    //eliminar una universidad
    public function eliminarUniversidad($id){
        $query = "DELETE FROM universidad WHERE id_uni = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado;
    }




}

?>