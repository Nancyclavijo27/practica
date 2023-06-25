<?php

class conexion{ 
      
private $servidor = "localhost";
private $usuario = "root";
private $contrasenia = "";
private $base_de_datos = "produc";

public function __construct(){     

try {
    $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->base_de_datos", $this->usuario, $this->contrasenia);
    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    return "Conexión fallida: " . $e->getMessage();
}
}

public function ejecutar($sql){//insertar, delete, Actualizar
    $this->conexion->exec($sql);
    return  $this->conexion->lastInsertId();
}

public function consultar($sql){
    $sentencia=$this->conexion->prepare($sql);
    $sentencia->execute();
    return $sentencia->fetchAll();
}


}
?>
