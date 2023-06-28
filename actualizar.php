<?php
include("datosb.php");

if($_POST){ 
    $nombre=$_POST["nombre"];
    $referencia=$_POST["referencia"];
    $precio=$_POST["precio"];
    $peso=$_POST["peso"];
    $categoria=$_POST["categoria"];
    $stock=$_POST["stock"];
    $fecha=$_POST["fecha"];

    $objConexion= new conexion(); 
    $sql="UPDATE `producto` SET `nombre`='$nombre', `referencia`='$referencia', `precio`='$precio', `peso`='$peso', `categoria`='$categoria', `stock`='$stock', `fecha`='$fecha' WHERE `ID` = '1'";
    $objConexion->ejecutar($sql);
}


  $objConexion= new conexion(); 
  $resultado=$objConexion->consultar("SELECT * FROM `producto`");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cafeteria</title>
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
        <a href="editar_producto.php?id=<?php echo $producto["ID"]; ?>">Editar</a>
      </ul> 
    <?php }?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-dark text-white mt-5 p-2">
        <form action="actualizar.php" method="post" >
        <div class="form-group">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <label for="nombre">Nombre de producto:</label>
        <input type="text" class="form-control" id="" name="nombre"  required>
           </div>
            <div class="form-group">
              <label for="referencia">Referencia:</label>
              <input type="text" class="form-control" id="" name="referencia" required>
            </div>
            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="number" class="form-control" id="" name="precio" required>
            </div>
            <div class="form-group">
              <label for="peso">Peso:</label>
              <input type="number" class="form-control" id="" name="peso" required>
            </div>
            <div class="form-group">
              <label for="categoria">Categoría:</label>
              <input type="text" class="form-control" id="" name="categoria" required>
            </div>
            <div class="form-group">
              <label for="stock">Stock:</label>
              <input type="number" class="form-control" id="" name="stock" required>
            </div>
            <div class="form-group">
              <label for="fecha_creacion">Fecha de creación:</label>
              <input type="date" class="form-control" id="" name="fecha" required>
            </div>
            <button type="submit" name="actualizar" class="btn btn-success mt-3">Actualizar</button>
            
          </form>

        </div>
      </div>
    </div>
  </div>
  
  
</body>
</html>