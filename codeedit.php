<?php include("datosb.php");?>

<?php 

// Obtener los valores del formulario
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$fecha=$_POST["fecha"];


// Actualizar los valores en la base de datos
$objConexion= new conexion(); 

    
$sql = "UPDATE `producto` SET `nombre` = '$nombre', `referencia` = '$referencia', `precio` = '$precio', `peso` = '$peso', `categoria` = '$categoria', `stock` = '$stock', `fecha` = '$fecha' WHERE `producto`.`ID` = $id;";

$objConexion->ejecutar($sql);

//var_dump($objConexion->ejecutar($sql));
//if ($objConexion->ejecutar($sql)) {
//  echo "Los datos se actualizaron correctamente.";
//} else {
//  echo "Error al actualizar los datos: " ;
//}

header('Location: cafeteria.php');
exit;



?>


