<?php
if (!isset($_POST["nombre"])) return;
$nombre = $_POST["nombre"];
include_once "dbproduc.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE nombre = ? LIMIT 1;");
$sentencia->execute([$nombre]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto) {
    if ($producto->stock < 1) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    session_start();
    $indice = false;
    for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
        if ($_SESSION["carrito"][$i]->nombre === $nombre) {
            $indice = $i;
            break;
        }
    }
    if ($indice === FALSE) {
        $producto->stock = 1;
        $producto->total = $producto->precio;
        array_push($_SESSION["carrito"], $producto);
    } else {
        $_SESSION["carrito"][$indice]->stock++;
        $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->stock * $_SESSION["carrito"][$indice]->precio;
    }
    header("Location: ./vender.php");
} else {
    header("Location: ./vender.php?status=4");
}

?>