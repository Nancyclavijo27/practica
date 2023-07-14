<?php include_once "encabezado.php" ?>
<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["referencia"]) || !isset($_POST["precio"]) || !isset($_POST["peso"]) || !isset($_POST["stock"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "dbproduc.php";
$nombre = $_POST["nombre"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$stock = $_POST["stock"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(nombre, referencia, precio, peso, stock) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $referencia, $precio, $peso, $stock]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>