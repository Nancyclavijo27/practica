<?php include_once "encabezado.php" ?>
<?php
include_once "dbproduc.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./nuevo.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Referencia</th>
					<th>Precio</th>
					<th>Peso</th>
					<th>stock</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->ID ?></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->referencia ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->peso ?></td>
					<td><?php echo $producto->stock?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar_productos.php?ID=" . $producto->ID?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar_producto.php?ID=" . $producto->ID?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>