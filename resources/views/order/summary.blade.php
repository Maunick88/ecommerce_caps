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
                <div id="paypalButtons"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=Ac45sG1IbQ_L21stWgWlZhGWjuyp_VJ12c5YVk-HLj1_MNDNgHJMPcJWT64Gc0JlMvk8qb81Z_8e37uq&currency=MXN"></script>

                <script>
    const total = {{ $total }}; // Obtén el total desde la variable blade

    // Obtener los productos del carrito
    const cartItems = [
        @foreach ($products as $product)
        {
            product_id: {{ $product->id }},
            quantity: {{ $cart[$product->id]['quantity'] }},
            price: {{ $product->price }}
        },
        @endforeach
    ];

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total.toFixed(2) // Redondea a dos decimales el total
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // Mostrar el mensaje de "Procesando pago"
            Swal.fire({
                title: 'Procesando Pago',
                text: 'Por favor, espera mientras se procesa tu pago.',
                allowOutsideClick: false,
                backdrop: true, // Oscurece el fondo
                didOpen: () => {
                    Swal.showLoading(); // Muestra un icono de carga
                }
            });
            return actions.order.capture().then(function(details) {
                // Obtén la información de los campos de envío
                const name = document.querySelector('input[name="name"]').value;
                const address = document.querySelector('input[name="address"]').value;
                const city = document.querySelector('input[name="city"]').value;
                const postal_code = document.querySelector('input[name="postal_code"]').value;
                const country = document.querySelector('input[name="country"]').value;

                // Realiza una solicitud AJAX para guardar la orden y los ítems en la base de datos
                fetch('{{ route('order.save') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF para seguridad
                    },
                    body: JSON.stringify({
                        name: name,
                        address: address,
                        city: city,
                        postal_code: postal_code,
                        country: country,
                        total: total,
                        paypal_transaction_id: details.id, // ID de la transacción de PayPal
                        items: cartItems // Agrega los ítems del carrito
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Usar SweetAlert para mostrar una única alerta de éxito
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Tu acción se ha guardo exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirigir a la vista de agradecimiento
                                window.location.href = '{{ route('order.thanks') }}'; // Ruta hacia la vista de agradecimiento
                            }
                        });
                    } else {
                        console.error('Error al guardar la orden:', data.error);
                        alert('Error al guardar la orden: ' + JSON.stringify(data.error));
                    }
                })
                .catch(error => console.error('Error de red:', error));

            });
        }
    }).render('#paypalButtons');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
