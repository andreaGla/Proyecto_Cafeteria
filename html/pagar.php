<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header('Location: index.php');
    exit;
}

$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'];
}

$pago_exitoso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pago_exitoso = true;
    
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Simulación de Pago</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        
        <?php if ($pago_exitoso): ?>
            <div class="pago-exitoso">
                <h2>¡Pago Aceptado!</h2>
                <p>Tu pedido ha sido procesado exitosamente.</p>
                <a href="index.php">Volver al menú</a>
            </div>

        <?php else: ?>
            <h1>Simulación de Pago</h1>
            <p>Total a pagar: <strong>$<?php echo number_format($total, 2); ?></strong></p>

            <div class="tarjetas-graficos">
                <img src="imagenes/visa.png" alt="Visa">
                <img src="imagenes/mastercard.png" alt="Mastercard">
            </div>

            <form action="pagar.php" method="POST" class="form-pago">
                <div class="form-grupo">
                    <label for="nombre">Nombre en la Tarjeta</label>
                    <input type="text" id="nombre" value="Demo (No real)">
                </div>
                <div class="form-grupo">
                    <label for="tarjeta">Número de Tarjeta (ficticio)</label>
                    <input type="text" id="tarjeta" value="4242 4242 4242 4242">
                </div>
                <div class="form-grupo-inline">
                    <div class="form-grupo">
                        <label for="fecha">Fecha (MM/AA)</label>
                        <input type="text" id="fecha" value="12/26">
                    </div>
                    <div class="form-grupo">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" value="123">
                    </div>
                </div>
                
                <button type="submit" class="btn-pagar-final">Pagar Ahora (Simulación)</button>
            </form>
        <?php endif; ?>
        
    </div>
</body>
</html>