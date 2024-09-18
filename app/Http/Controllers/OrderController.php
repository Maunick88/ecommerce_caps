<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de importar el modelo User
use App\Models\Product; // Asegúrate de importar el modelo Product
use App\Models\Order; // Asegúrate de importar el modelo Order
use Srmklive\PayPal\Facades\PayPal; // Importa el facade de PayPal

class OrderController extends Controller
{
    public function showSummary()
{
    // Obtener el carrito de la sesión
    $cart = session()->get('cart', []);

    // Verificar si el carrito está vacío
    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'El carrito está vacío.');
    }

    // Obtener los IDs de los productos en el carrito
    $productIds = array_keys($cart);

    // Obtener los productos desde la base de datos
    $products = Product::whereIn('id', $productIds)->get();

    // Calcular el total del carrito
    $total = 0;
    foreach ($products as $product) {
        $total += $product->price * $cart[$product->id]['quantity'];
    }

    // Guardar el total en la sesión para usarlo en PayPal
    session()->put('cart_total', $total);

    // Retornar la vista de resumen con los productos y el total
    return view('order.summary', compact('products', 'cart', 'total'));
}


public function createPayPalPayment()
{
    // Inicializar PayPal con las credenciales configuradas en el archivo de configuración
    $provider = PayPal::setProvider('paypal'); // Asegúrate de usar 'paypal' como el proveedor
    
    // Configurar las credenciales de API de PayPal desde el archivo de configuración
    $provider->getAccessToken();

    // Crear la orden de pago
    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('order.success'),
            "cancel_url" => route('order.cancel'),
        ],
        "purchase_units" => [
            0 => [
                "amount" => [
                    "currency_code" => "MXN",
                    "value" => session()->get('cart_total', 0) // Total del carrito
                ]
            ]
        ]
    ]);

    if (isset($response['id']) && $response['status'] == 'CREATED') {
        // Redirigir al usuario a PayPal
        foreach ($response['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('order.summary')->with('error', 'Error al redirigir a PayPal.');
    }

    return redirect()->route('order.summary')->with('error', $response['message'] ?? 'Error al crear el pedido con PayPal.');
}

public function capturePayPalPayment(Request $request)
{
    $provider = new PayPal;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    $response = $provider->capturePaymentOrder($request['token']);

    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        // Aquí es donde procesarías la orden después de que el pago ha sido exitoso.
        return redirect()->route('order.success')->with('success', 'Pago procesado correctamente!');
    }

    return redirect()->route('order.summary')->with('error', $response['message'] ?? 'Error al capturar el pago.');
}

public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return response()->json(['success' => true, 'message' => 'Estado de la orden actualizado exitosamente.']);
}

}
