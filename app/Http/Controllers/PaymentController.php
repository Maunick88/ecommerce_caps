<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
}
