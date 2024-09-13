<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    public function create()
    {
        return view('support.create');
    }

    public function store(Request $request)
{
    // Validación del formulario
    $request->validate([
        'type' => 'required|in:queja,sugerencia,falla,devolucion,problemas con la pagina',
        'comment' => 'required|string',
        'transaction_id' => 'required_if:type,devolucion|nullable|string'
    ], [
        'transaction_id.required_if' => 'El ID de transacción es obligatorio para devoluciones.',
    ]);

    // Inicializamos el order_id como null
    $orderId = null;

    // Si el tipo es 'devolucion', buscamos la orden por el ID de transacción
    if ($request->input('type') === 'devolucion') {
        $transactionId = $request->input('transaction_id');

        // Busca la orden por el ID de transacción
        $order = Order::where('paypal_transaction_id', $transactionId)->first();

        // Verifica si la orden fue encontrada
        if (!$order) {
            return redirect()->back()->withErrors(['transaction_id' => 'El ID de transacción no es válido o no se encontró.']);
        }

        // Si existe, obtenemos el order_id
        $orderId = $order->id;


    }

    // Guardar el ticket de soporte con el order_id
    $supportTicket = SupportTicket::create([
        'user_id' => Auth::id(),
        'type' => $request->input('type'),
        'comment' => $request->input('comment'),
        'transaction_id' => $request->input('transaction_id'),
        'order_id' => $orderId  // Aquí se asigna el order_id obtenido
    ]);


    return redirect()->back()->with('success', 'Su comentario ha sido enviado con éxito.');
}

    
}
