<?php


require_once 'Conexion.php';

class Carrera {


   
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    //Método para obtener la carrera 
    //Retorna un array con los datos de las carreras

    public function obtenerCarrera(){
        $query = "SELECT c.id_carrera as id_carrera, c.nombre as nombre, u.nombre as universidad  FROM carreras as c INNER JOIN universidad as u ON c.id_universidad = u.id_uni";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    //Método para agregar una nueva carrera a la base de datos.
    //Recibe como parámetros el nombre de la carrera y el id de la universidad a la que pertenece.

    public function agregarCarrera($nombre, $id_universidad){
        $query = "INSERT INTO carreras (nombre, id_universidad) VALUES ('$nombre',  '$id_universidad')";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado;
    }

    public function obtenerCarreraPorId($id){
        $query = "SELECT c.id_carrera as id_carrera, c.nombre as nombre, u.nombre as universidad  FROM carreras as c INNER JOIN universidad as u ON c.id_universidad = u.id_uni WHERE id_carrera = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_assoc();
    }

    //Método para actualizar una carrera en la base de datos.
    public function actualizarCarrera($id, $nombre, $id_universidad){
        $query = "UPDATE carreras SET nombre = '$nombre', id_universidad = '$id_universidad' WHERE id_carrera = '$id'";
        return $this->conexion->conectar()->query($query);
    }

    //Método para eliminar una carrera de la base de datos.
    public function eliminarCarrera($id){
        $query = "DELETE FROM carreras WHERE id_carrera = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado;
    }




}

?>