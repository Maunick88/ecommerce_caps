<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderConfirmation; // Asegúrate de que esta línea esté presente

class PaymentController extends Controller
{
    public function saveOrder(Request $request)
    {
        // Valida la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'total' => 'required|numeric',
            'paypal_transaction_id' => 'required|string',
            'items' => 'required|array', // Asegura que los ítems están presentes
            'items.*.product_id' => 'required|exists:products,id', // Verifica que cada producto exista
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            // Guarda la orden
            $order = Order::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'total_price' => $request->total,
                'paypal_transaction_id' => $request->paypal_transaction_id,
            ]);

            // Guarda los ítems de la orden
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price, // Utiliza el precio actual del producto
                ]);
            }

            return response()->json(['success' => 'Orden y ítems guardados exitosamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

        public function thanks(Request $request)
    {
        // Obtener el usuario actual
        $user = $request->user();
       
        // Obtener el ID de la transacción de PayPal desde la URL
        $paypalTransactionId = $request->query('paypal_transaction_id');

        // Encontrar la orden por ID de transacción
        $order = Order::where('paypal_transaction_id', $paypalTransactionId)->first();

        if ($order && $user) {
            // Enviar notificación de confirmación de pedido
            $user->notify(new OrderConfirmation($order));
        }

        // Renderizar la vista de agradecimiento
        return view('order.thanks', compact('order'));
    }

    public function details($id)
    {
        // Encontrar la orden por su ID
        $order = Order::findOrFail($id);

        // Verificar si la orden pertenece al usuario actual (opcional, pero recomendado)
        if (auth()->id() !== $order->user_id) {
            abort(403, 'No tienes permiso para ver esta orden.');
        }

        // Renderizar la vista de detalles de la orden
        return view('order.details', compact('order'));
    }
}
