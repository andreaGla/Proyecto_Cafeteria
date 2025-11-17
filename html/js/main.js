// Espera a que todo el contenido de la página se cargue
document.addEventListener("DOMContentLoaded", function() {
    
    // Selecciona TODOS los botones que tengan la clase 'btn-agregar'
    const botonesAgregar = document.querySelectorAll('.btn-agregar');
    
    // Añade un "escuchador de clics" a cada botón
    botonesAgregar.forEach(function(boton) {
        
        boton.addEventListener('click', function(event) {
            
            // Este script es solo para efectos visuales,
            // la lógica real ocurre en 'hacer_pedido.php'
            
            // Encuentra la tarjeta (el 'padre' del botón)
            const tarjeta = event.target.closest('.producto-card');
            
            // Saca el nombre del producto del <h3> dentro de la tarjeta
            const nombreProducto = tarjeta.querySelector('h3').textContent;
            
            // Muestra una alerta simple
            // (La página se recargará tan rápido que quizás ni se vea)
            console.log("Agregando: " + nombreProducto);
            
        });
    });
});