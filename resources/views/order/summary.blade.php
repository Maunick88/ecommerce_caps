@include('header')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .container-custom {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item img {
        width: 80px;
        height: auto;
        margin-right: 15px;
    }

    .total {
        text-align: right;
        font-size: 18px;
        font-weight: bold;
        margin-top: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-custom {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        display: block;
        width: 100%;
        font-size: 16px;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }
    
    a{
    font-family: "New Amsterdam", sans-serif;
    text-decoration: none;
    color: #000000;
    font-size: 22px;
    display: block;
    transition: .3s ease;
}

</style>

<body>
    <div class="container mt-4">
    <div class="right-side pyramid">
                <img src="{{ asset('img/logo.png') }}" alt="" class="gold glow image">
            </div>

        <div class="container-custom">
            <h3>Productos en tu Carrito</h3>
            @foreach ($products as $product)
                <div class="cart-item">
                    <div>
                        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                        <strong>{{ $product->name }}</strong>
                        <span>{{ $cart[$product->id]['quantity'] }} x {{ number_format($product->price, 2) }} USD</span>
                    </div>
                    <div class="text-right">
                        <span>Subtotal: {{ number_format($product->price * $cart[$product->id]['quantity'], 2) }} USD</span>
                    </div>
                </div>
            @endforeach

            <!-- Mostrar el total -->
            <div class="total">Total: {{ number_format($total, 2) }} MXN</div>

            <h3 class="mt-4">Información de Envío</h3>
            <form action="{{ route('order.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Completo:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Dirección:</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">Ciudad:</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text" class="form-control" name="postal_code" required>
                </div>
                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text" class="form-control" name="country" required>
                </div>
                <!-- Selección de Método de Pago -->
                <div class="form-group">
                    <label for="payment_method">Método de Pago:</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="credit_card">Tarjeta de Crédito</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>

                <!-- Sección de Pago con Tarjeta de Crédito -->
                <div class="payment-section" id="credit-card-section">
                    <h4>Pago con Tarjeta de Crédito</h4>
                    <div class="form-group">
                        <label for="card_number">Número de Tarjeta:</label>
                        <input type="text" class="form-control" name="card_number" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Fecha de Expiración:</label>
                        <input type="text" class="form-control" name="expiry_date" placeholder="MM/YY">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" name="cvv" placeholder="123">
                    </div>
                </div>

                <!-- Sección de Pago con PayPal -->
                <div class="payment-section" id="paypal-section">
                    <h4>Pago con PayPal</h4>
                    <p>Serás redirigido a PayPal para completar tu pago de forma segura.</p>
                </div>

                <button type="submit" class="btn btn-custom">Proceder al Pago</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            var paymentMethod = this.value;

            // Ocultar todas las secciones de pago
            document.getElementById('credit-card-section').style.display = 'none';
            document.getElementById('paypal-section').style.display = 'none';

            // Mostrar la sección correspondiente según el método de pago seleccionado
            if (paymentMethod === 'credit_card') {
                document.getElementById('credit-card-section').style.display = 'block';
            } else if (paymentMethod === 'paypal') {
                document.getElementById('paypal-section').style.display = 'block';
            }
        });
    </script>
</body>
