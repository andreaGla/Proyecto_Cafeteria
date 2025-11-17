<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_producto = $_POST['producto_id'];
    $nombre_producto = $_POST['producto_nombre'];
    $precio_producto = $_POST['producto_precio'];
    
    $producto = [
        'id' => $id_producto,
        'nombre' => $nombre_producto,
        'precio' => $precio_producto
    ];
    
    $_SESSION['carrito'][] = $producto;
}

header('Location: index.php');
exit;
?>