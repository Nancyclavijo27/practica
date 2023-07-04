<?php 
include("datosb.php");
  
$objConexion= new conexion();
 
//$id = $_GET["ID"];
//$producto="SELECT * FROM producto WHERE ID=".$id."";
$resultado=$objConexion->consultar("SELECT * FROM `producto`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edicion</title>
  <link rel="stylesheet" href="estilos.css">
  <!-- Estilos Bootstrap CDN -->
      <link 
      rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
      crossorigin="anonymous">
      <script src="App.js"></script>
     
</head>
<body>
   
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <div class="bg-dark text-white mt-5 p-2" id="contenido">
          <h2>Lista de Productos</h2> 
          <?php foreach($resultado as $producto ) {?>
      <ul id="ID">
        <li>Nombre de producto: <?php echo $producto['nombre']; ?></li>
        <li>Referencia: <?php echo $producto['referencia']; ?></li>
        <li>Precio: <?php echo $producto['precio']; ?></li>
        <li>Peso: <?php echo $producto['peso']; ?></li>
        <li>Categoría: <?php echo $producto['categoria']; ?></li>
        <li>Stock: <?php echo $producto['stock']; ?></li>
        <li>Fecha de creación: <?php echo $producto['fecha']; ?></li>
        <a  class="btn btn-danger" href="editar.php?id=<?php echo $producto["ID"]; ?>">Editar</a>
      </ul> 
    <?php }?>
        </div>
      </div>
     
    </div>
  </div>
  
  
</body>
</html>