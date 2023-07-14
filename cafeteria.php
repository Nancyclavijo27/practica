<?php include("datosb.php");?>

<?php 
$mi_variable = "nombre";
//var_dump($mi_variable);
ob_start();
//var_dump($mi_variable);
$output = ob_get_clean();
//echo $output;

if($_POST){ 
    //var_dump($_POST);
    $nombre=$_POST["nombre"];
    $referencia=$_POST["referencia"];
    $precio=$_POST["precio"];
    $peso=$_POST["peso"];
    $categoria=$_POST["categoria"];
    $stock=$_POST["stock"];
    $fecha=$_POST["fecha"];
    

 $objConexion= new conexion(); 
 $sql="INSERT INTO `producto` (`ID`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha`) VALUES (NULL, '$nombre', '$referencia', '$precio', '$peso', '$categoria', '$stock', '$fecha');";
 $objConexion->ejecutar($sql);
 //var_dump($objConexion->ejecutar($sql));
}
 if(isset($_GET["borrar"])){
    $id = $_GET["borrar"];
    $objConexion = new conexion(); 
    $sql = "DELETE FROM producto WHERE `producto`.`ID`=".$id;
    $objConexion->ejecutar($sql);
    
  }

 //"DELETE FROM producto WHERE `producto`.`ID` = 2"?
 
 $objConexion= new conexion(); 
 $resultado=$objConexion->consultar("SELECT * FROM `producto`");

 //print_r($resultado);


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
        <a class="btn btn-danger" href="./index.php">Retorno a pagina prinncipal</a>
          <h2>Lista de Productos<a class="btn btn-danger"  href="edicion.php">Edicion</a> </h2> 
          <?php foreach($resultado as $producto ) {?>
      <ul id="ID">
        <li>Nombre de producto: <?php echo $producto['nombre']; ?></li>
        <li>Referencia: <?php echo $producto['referencia']; ?></li>
        <li>Precio: <?php echo $producto['precio']; ?></li>
        <li>Peso: <?php echo $producto['peso']; ?></li>
        <li>Categoría: <?php echo $producto['categoria']; ?></li>
        <li>Stock: <?php echo $producto['stock']; ?></li>
        <li>Fecha de creación: <?php echo $producto['fecha']; ?></li>
        <a  class="btn btn-danger" href="?borrar=<?php echo $producto['ID']; ?>">Eliminar</a>
      </ul> 
    <?php }?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-dark text-white mt-5 p-2">
        <form action="cafeteria.php" method="post" >
            <div class="form-group">
              <input type="hidden" name="id" value="1">
              <label for="nombre">Nombre de producto:</label>
              <input type="text" class="form-control" id="" name="nombre" required>
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
            <input type="submit" value="Enviar" class="btn btn-primary">
          </form>
            
        </div>
      </div>
    </div>
  </div>
</body>
</html>