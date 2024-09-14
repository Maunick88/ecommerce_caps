<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SupportTicket;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener datos de las tablas
        $products = Product::all();
        $orders = Order::all();
        $orderItems = OrderItem::all();
        $supportTickets = SupportTicket::all();

        // Pasar los datos a la vista
        return view('dashboard.index', compact('orders', 'orderItems', 'supportTickets'));
    }
}
