<?php
session_start();

// Proteger la página: solo 'admin' puede entrar
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>
    <div class="admin-wrapper">
        <nav class="sidebar">
            <h2>Admin Panel</h2>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>

        <main class="content">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <p>Panel de control para análisis de ventas.</p>

            <div class="card">
                <h2>Ventas del Mes (Simulación)</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Unidades Vendidas</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cafe americano AROMA</td>
                            <td>120</td>
                            <td>$3,000.00</td>
                        </tr>
                        <tr>
                            <td>Latte</td>
                            <td>95</td>
                            <td>$3,325.00</td>
                        </tr>
                        <tr>
                            <td>Croissant</td>
                            <td>80</td>
                            <td>$2,280.00</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn-descargar">Descargar Reporte (.csv)</button>
            </div>

            <div class="card">
                <h2>Ventas del Año (Gráfica de Simulación)</h2>
                <div class="grafica-simulada">
                    <div style="height: 60%; background: #4caf50;"></div>
                    <div style="height: 40%; background: #4caf50;"></div>
                    <div style="height: 70%; background: #4caf50;"></div>
                    <div style="height: 85%; background: #4caf50;"></div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
