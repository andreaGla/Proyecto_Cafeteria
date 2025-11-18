document.addEventListener("DOMContentLoaded", function() {
    
    const botonesAgregar = document.querySelectorAll('.btn-agregar');
    

    botonesAgregar.forEach(function(boton) {
        
        boton.addEventListener('click', function(event) {
            
            // Este script es solo para efectos visuales.

            const tarjeta = event.target.closest('.producto-card');
            
            const nombreProducto = tarjeta.querySelector('h3').textContent;

            console.log("Agregando: " + nombreProducto);
            
        });
    });
});