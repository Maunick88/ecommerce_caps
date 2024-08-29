<!-- resources/views/cart.blade.php -->
@include('header')  



<body>
    <h2 style="text-align: center;">Carrito de Compras</h2>
    
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <div class="cart-container">
        @php $total = 0; @endphp
        @foreach ($products as $product)
            @php $subtotal = $product->price * $cart[$product->id]['quantity']; @endphp
            <div class="cart-item">
                <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="img-card">
                <div class="item-details">
                    <div><strong>{{ $product->name }}</strong></div>
                    <div>Precio: {{ number_format($product->price, 2) }} MXN</div>
                    <div>Cantidad: {{ $cart[$product->id]['quantity'] }}</div>
                    <div>Subtotal: {{ number_format($subtotal, 2) }} MXN</div>
                </div>
                <div class="item-actions">
                    <!-- Formulario para actualizar cantidad -->
                    <form action="{{ route('cart.update') }}" method="POST" class="quantity-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label for="quantity-{{ $product->id }}">Cantidad:</label>
                        <input type="number" name="quantity" id="quantity-{{ $product->id }}" value="{{ $cart[$product->id]['quantity'] }}" min="1" class="quantity-input">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Actualizar</button>
                    </form>
                    
                    <!-- Botón para eliminar producto del carrito -->
                    <form action="{{ route('cart.remove') }}" method="POST">
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
        <a href="{{ route('order.summary') }}" class="btn">Ir al Resumen del Pedido</a>
    </div>
</body>
