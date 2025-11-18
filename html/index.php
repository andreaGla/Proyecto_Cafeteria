<?php
session_start();

// --- AÑADIDO: INICIO DEL BLOQUE DE SEGURIDAD ---
// Si no existe la variable de sesión 'user_id', significa que no ha iniciado sesión.
if (!isset($_SESSION['user_id'])) {
    // Lo mandamos de vuelta a la página de login.
    header('Location: login.php');
    exit; // Detenemos la carga del resto de la página
}
// --- FIN DEL BLOQUE DE SEGURIDAD ---


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería Aroma - Menú</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <a href="logout.php" class="btn-logout">Cerrar Sesión (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>

    <div class="container">

        <div class="carrito">
            <h2>Mi Pedido (Calculadora)</h2>
            <?php if (empty($_SESSION['carrito'])): ?>
                <p>Tu carrito está vacío.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($_SESSION['carrito'] as $index => $producto): ?>
                        <li><?php echo htmlspecialchars($producto['nombre']); ?> - $<?php echo htmlspecialchars($producto['precio']); ?></li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <p class="total">TOTAL: $<?php echo number_format($total, 2); ?></p>
                <a href="pagar.php" class="btn-pagar">Proceder al Pago</a>
                <a href="limpiar_carrito.php" class="btn-vaciar">Vaciar Carrito</a>
            <?php endif; ?>
        </div>
        <h1>☕ Menú de Cafetería Aroma ☕</h1>

        <div class="menu-container">
            <?php
            try {
                // (Tu código de base de datos existente)
                $db = new PDO('sqlite:db/cafeteria.db');
                $query = $db->query('SELECT * FROM menu');

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $nombre = htmlspecialchars($row['nombre']);
                    $precio = htmlspecialchars($row['precio']);
                    $id = htmlspecialchars($row['id']);
                    
                    echo <<<HTML
                    <div class="producto-card">
                        <img src="imagenes/latte.jpg" alt="Imagen de $nombre">
                        <h3>$nombre</h3>
                        <p class="precio">$$precio</p>
                        
                        <form action="hacer_pedido.php" method="POST">
                            <input type="hidden" name="producto_id" value="$id">
                            <input type="hidden" name="producto_nombre" value="$nombre">
                            <input type="hidden" name="producto_precio" value="$precio">
                            <button type="submit" class="btn-agregar">Agregar al Pedido</button>
                        </form>
                    </div>
HTML;
                }
            } catch (PDOException $e) {
                echo "Error: No se puede conectar a la base de datos. Revisa los permisos.";
            }
            ?>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>