<!-- resources/views/cart.blade.php -->
@include('header')

<body>
    <h2 style="text-align: center;">Carrito de Compras</h2>
    
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <div class="cart-container">
        @php $total = 0; @endphp
        
        <!-- Verifica si hay productos en el carrito -->
        @if ($products->isNotEmpty())
            @foreach ($products as $product)
                @php $subtotal = $product->price * $cart[$product->id]['quantity']; @endphp
                <div class="cart-item">
                <img src="{{ route('product.image', ['id' => $product->id]) }}" alt="{{ $product->name }}" class="img-card image">
                <div class="item-details">
                        <div><strong>{{ $product->name }}</strong></div>
                        <div>Precio: {{ number_format($product->price, 2) }} MXN</div>
                        <div>Cantidad: {{ $cart[$product->id]['quantity'] }}</div>
                        <div>Subtotal: {{ number_format($subtotal, 2) }} MXN</div>
                    </div>
                    <div class="item-actions">
                        <!-- Formulario para actualizar cantidad -->
                        <form onsubmit="actualizarCantidad(event, {{ $product->id }})" method="POST" class="quantity-form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <label for="quantity-{{ $product->id }}">Cantidad:</label>
                            <input type="number" name="quantity" id="quantity-{{ $product->id }}" value="{{ $cart[$product->id]['quantity'] }}" min="1" class="quantity-input">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Actualizar</button>
                        </form>
                        
                        <!-- Botón para eliminar producto del carrito -->
                        <form onsubmit="eliminarProducto(event, {{ $product->id }})" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
                @php $total += $subtotal; @endphp
            @endforeach

            <!-- Mostrar total del carrito -->
            <div class="total">Total: {{ number_format($total, 2) }} MXN</div>
            <!-- Botón para ir al resumen del pedido -->
            <a href="{{ route('order.summary') }}" class="btn-cart">Ir al Resumen del Pedido</a>
        @else
            <!-- Mensaje cuando no hay productos en el carrito -->
            <div class="empty-cart-message">
                No hay productos en tu carrito.
            </div>
        @endif
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function actualizarCantidad(event, productId) {
    event.preventDefault(); // Evita el envío normal del formulario

    // Obtén el valor de la cantidad
    const quantity = document.getElementById('quantity-' + productId).value;

    fetch("{{ route('cart.update') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire({
            title: '¡Cantidad Actualizada!',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            location.reload(); // Recarga la página para actualizar los datos
        });
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al actualizar la cantidad.',
            icon: 'error',
            confirmButtonText: 'Intentar de nuevo'
        });
    });
}

function eliminarProducto(event, productId) {
    event.preventDefault(); // Evita el envío normal del formulario

    fetch("{{ route('cart.remove') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire({
            title: '¡Producto Eliminado!',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            location.reload(); // Recarga la página para actualizar los datos
        });
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al eliminar el producto.',
            icon: 'error',
            confirmButtonText: 'Intentar de nuevo'
        });
    });
}
</script>
