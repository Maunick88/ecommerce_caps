// public/js/cart.js

// Función para agregar producto al carrito usando AJAX
function agregarProductoAlCarrito(productId) {
    fetch(addProductUrl, { // Utiliza la URL generada por Laravel
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => response.json())
    .then(data => {
        // Mostrar SweetAlert al recibir la respuesta del servidor
        Swal.fire({
            title: '¡Producto Agregado!',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
