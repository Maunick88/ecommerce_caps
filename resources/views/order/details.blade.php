@include('header')

<div class="section">
    <h3 class="main-title">Detalles de la Orden #{{ $order->id }} <br><br>
    # Ticket: {{ $order->paypal_transaction_id }}</h3>


    <div class="cart-container centered-content">
        <p><strong>Nombre:</strong> {{ $order->name }}</p>
        <p><strong>Dirección:</strong> {{ $order->address }}</p>
        <p><strong>Ciudad:</strong> {{ $order->city }}</p>
        <p><strong>Código Postal:</strong> {{ $order->postal_code }}</p>
        <p><strong>País:</strong> {{ $order->country }}</p>
    </div>

    <h3 class="sub-title">Productos:</h3>
    <ul class="product-list">
        @foreach ($order->items as $item)
            <li class="cart-item">
                <span class="product-title">{{ $item->product->name }}</span> 
                - Cantidad: {{ $item->quantity }} 
                - Precio: {{ number_format($item->price, 2) }} USD
            </li>
        @endforeach
        <p><strong>Total:</strong> {{ number_format($order->total_price, 2) }} MXN</p>

    </ul>

    <div class="button-container">
        <a href="{{ route('order.thanks') }}" class="btn btn-primary">Volver</a>
    </div>
</div>

<style>
    .section {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 20px auto;
        font-family: 'Poppins', sans-serif;
    }

    .main-title {
        font-size: 2.5rem;
        color: #000000;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .sub-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 15px;
    }

    .cart-container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        text-align: center;
    }

    .centered-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .cart-item {
        margin: 10px 0;
        font-size: 1.2rem;
        color: #444;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .product-list {
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }
</style>
