function agregarProductoAlCarrito(event, productId = null) {
    event.preventDefault(); // Evita el envío normal del formulario

    // Si no se proporciona productId, obtén el del modal
    if (!productId) {
        productId = document.getElementById('modalProductId').value;
    }

    // Obtén la cantidad seleccionada
    const quantity = document.getElementById('quantity') ? document.getElementById('quantity').value : 1;

    // Envía los datos usando fetch
    fetch(addProductUrl, { // Utiliza la URL generada por Laravel
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ 
            product_id: productId,
            quantity: quantity // Incluye la cantidad seleccionada o predeterminada
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
        return response.json();
    })
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
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al agregar el producto al carrito.',
            icon: 'error',
            confirmButtonText: 'Intentar de nuevo'
        });
    });
}
function closeModal(event) {
    // Cierra el modal solo si se hace clic fuera del contenido o en el botón de cerrar
    const modal = document.getElementById('productModal');
    if (event.target === modal || event.target.classList.contains('close')) {
        modal.style.display = 'none';
    }
}


