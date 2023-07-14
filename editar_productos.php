<?php
if(!isset($_GET["ID"])) exit();
$ID = $_GET["ID"];
include_once "dbproduc.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE ID = ?;");
$sentencia->execute([$ID]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->ID; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="ID" value="<?php echo $producto->ID; ?>">
	
			<label for="nombre">Nombre del producto:</label>
			<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="referencia">Referencia:</label>
			<textarea required id="referencia" name="referencia" cols="10" rows="1" class="form-control"><?php echo $producto->referencia ?></textarea>

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

			<label for="peso">Peso:</label>
			<input value="<?php echo $producto->peso ?>" class="form-control" name="peso" required type="number" id="peso" placeholder="Peso">

			<label for="stock">Existencia:</label>
			<input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="stock o existencia">
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>