<?php include("datosb.php");?>
<?php 
if($_POST){
    print_r($_POST);
    

 $objConexion= new conexion(); 
 $sql="INSERT INTO `producto` (`ID`, `nombre`, `referencia`, `precio`, `peso`, `categoría`, `stock`, `fecha`) VALUES (NULL, 'jugos', 'Rc', '6000', '1000', 'Bebida', '100', '2023-06-24');";
 $objConexion->ejecutar($sql); 
}
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
          <ul id="ID"></ul>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-dark text-white mt-5 p-2">
        <form action="index.php" method="post"    >
            <div class="form-group">
              <label for="nombre">Nombre de producto:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
              <label for="referencia">Referencia:</label>
              <input type="text" class="form-control" id="referencia" name="referencia" required>
            </div>
            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="form-group">
              <label for="peso">Peso:</label>
              <input type="number" class="form-control" id="peso" name="peso" required>
            </div>
            <div class="form-group">
              <label for="categoria">Categoría:</label>
              <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>
            <div class="form-group">
              <label for="stock">Stock:</label>
              <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
              <label for="fecha_creacion">Fecha de creación:</label>
              <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
            </div>
            <input type="submi" value="Enviar" class="btn btn-primary">
            <button type="submi" class="btn btn-primary" id="createBtn">Crear</button>
            <button type="button" class="btn btn-danger" id="editBtn">Editar</button>
           
          </form>

        </div>
      </div>
    </div>
  </div>
  
  
</body>
</html>
