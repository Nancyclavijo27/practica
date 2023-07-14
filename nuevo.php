<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="codigo_nuevo.php">
		<label for="nombre">Nombre del producto:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

		<label for="referencia">Referencia:</label>
		<textarea required id="referencia" name="referencia" cols="10" rows="1" class="form-control"></textarea>

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

		<label for="peso">Peso:</label>
		<input class="form-control" name="peso" required type="number" id="peso" placeholder="Peso">

		<label for="stock">stock:</label>
		<input class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>