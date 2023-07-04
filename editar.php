<?php 
include("datosb.php");
  
$objConexion= new conexion();
 
$resultado = null;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $producto = "SELECT * FROM producto WHERE ID=".$id."";
  $resultado = $objConexion->consultar($producto);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar</title>
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
        <h2>Productos a editar</h2> 

        <?php
  if ($resultado) {
?>
<div class="col-md-6">
        <div class="bg-dark text-white mt-5 p-2">
<form action="codeedit.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <label for="nombre">Nombre de producto:</label>
  <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo isset($resultado[0]['nombre']) ? $resultado[0]['nombre'] : ''; ?>">
  
  <label for="referencia">Referencia:</label>
  <input type="text" name="referencia" class="form-control" id="referencia" value="<?php echo isset($resultado[0]['referencia']) ? $resultado[0]['referencia'] : ''; ?>">

  <label for="precio">Precio:</label>
  <input type="text" name="precio" class="form-control" id="precio" value="<?php echo isset($resultado[0]['precio']) ? $resultado[0]['precio'] : ''; ?>">

  <label for="peso">Peso:</label>
  <input type="text" name="peso" class="form-control" id="peso" value="<?php echo isset($resultado[0]['peso']) ? $resultado[0]['peso'] : ''; ?>">

  <label for="categoria">Categoría:</label>
  <input type="text" name="categoria" class="form-control" id="categoria" value="<?php echo isset($resultado[0]['categoria']) ? $resultado[0]['categoria'] : ''; ?>">

  <label for="stock">Stock:</label>
  <input type="text" name="stock" class="form-control" id="stock" value="<?php echo isset($resultado[0]['stock']) ? $resultado[0]['stock'] : ''; ?>">
  <div class="form-group">
  <label for="fecha">Fecha de creación:</label>
  <input type="text" name="fecha" class="form-control" id="fecha" value="<?php echo isset($resultado[0]['fecha']) ? $resultado[0]['fecha'] : ''; ?>">
  </div>
  <input type="submit" class="btn btn-primary"  value="Enviar">
  
</form>
</div>
      </div>
<?php
  }
?>


      </div>
    </div>
  </div>
</div>
  
  
</body>
</html>