<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["referencia"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["peso"]) || 
	!isset($_POST["stock"]) || 
	!isset($_POST["ID"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "dbproduc.php";
$ID = $_POST["ID"];
$nombre = $_POST["nombre"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$stock = $_POST["stock"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET nombre = ?, referencia = ?, precio= ?, peso = ?, stock = ? WHERE ID = ?;");
$resultado = $sentencia->execute([$nombre, $referencia, $precio, $peso, $stock, $ID]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>