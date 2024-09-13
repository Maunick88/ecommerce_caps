@component('mail::message')
# Confirmación de tu Pedido

Hola {{ $user->name }},

Gracias por tu compra. Tu pedido ha sido procesado exitosamente.

**# Ticket:** {{ $order->paypal_transaction_id }}

@component('mail::button', ['url' => url('/order/details/' . $order->id)])
Ver Pedido
@endcomponent

Gracias por confiar en nosotros.

Saludos,<br>
{{ config('app.name') }}
@endcomponent
