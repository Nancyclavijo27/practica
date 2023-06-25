<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produc";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM producto";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);?>
  
  
  <?php
function venderProducto($idProducto, $cantidad) {
    global $conexion;
    
    // Consulta para obtener la información del producto
    $consultaProducto = "SELECT stock FROM productos WHERE id = $idProducto";
    $resultadoProducto = mysqli_query($conexion, $consultaProducto);
    $producto = mysqli_fetch_assoc($resultadoProducto);
    
    // Verificar si hay suficiente stock
    if ($producto['stock'] >= $cantidad) {
        // Calcular nuevo stock
        $nuevoStock = $producto['stock'] - $cantidad;
        
        // Actualizar stock en la base de datos
        $consultaUpdate = "UPDATE productos SET stock = $nuevoStock WHERE id = $idProducto";
        mysqli_query($conexion, $consultaUpdate);
        
        // Registrar la venta en la tabla correspondiente
        $fechaVenta = date('Y-m-d');
        $consultaInsert = "INSERT INTO ventas (id_producto, cantidad, fecha) VALUES ($idProducto, $cantidad, '$fechaVenta')";
        mysqli_query($conexion, $consultaInsert);
        
        // Mostrar mensaje de éxito
        echo "Venta realizada correctamente";
    } else {
        // Mostrar mensaje de error
        echo "No hay suficiente stock para realizar la venta";
    }
}

// Ejemplo de uso
venderProducto(1, 5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
</head>
<body>
    
</body>
</html>