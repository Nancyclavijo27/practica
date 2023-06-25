<?php
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$base_de_datos = "produc";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_de_datos", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM `producto`";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    //print_r($resultado);

    foreach($resultado as $foto){
       echo print_r($foto["Nombre de producto" ])."<br/>";//imprime por nombre  sin el corchete imprime todo
    }
    
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}
?>