<?php include_once "encabezado.php" ?>
<?php
include_once "dbproduc.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Referencia</th>
					<th>Nombre</th>
					<th>Precio de compra</th>
					<th>Precio</th>
					<th>Stock</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->ID ?></td>
					<td><?php echo $producto->referencia ?></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->peso ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->stock ?></td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>