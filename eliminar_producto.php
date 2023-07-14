<?php
if(!isset($_GET["ID"])) exit();
$ID = $_GET["ID"];
include_once "dbproduc.php";
$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE ID = ?;");
$resultado = $sentencia->execute([$ID]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>