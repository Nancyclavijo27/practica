<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificación de envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $id_producto = $_POST["id_producto"];
  $cantidad = $_POST["cantidad"];

  // Obtener información del producto
  $sql = "SELECT stock, precio FROM productos WHERE id = $id_producto";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Si el producto existe en la base de datos, verificar si hay suficiente stock
    $row = $result->fetch_assoc();
    $stock_disponible = $row["stock"];
    $precio_unitario = $row["precio"];

    if ($stock_disponible >= $cantidad) {
      // Si hay suficiente stock, hacer la venta y actualizar las tablas
      $nuevo_stock = $stock_disponible - $cantidad;
      $sql = "UPDATE productos SET stock = $nuevo_stock WHERE id = $id_producto";
      $conn->query($sql);

      $fecha_venta = date("Y-m-d H:i:s");
      $sql = "INSERT INTO ventas (id_producto, cantidad, precio_unitario, fecha_venta) VALUES ($id_producto, $cantidad, $precio_unitario, '$fecha_venta')";
      $conn->query($sql);

      echo "Venta realizada con éxito.";
    } else {
      echo "No hay suficiente stock para realizar la venta.";
    }
  } else {
    echo "No se encontró el producto en la base de datos.";
  }
}

$conn->close();
?>