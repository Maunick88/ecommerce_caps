<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

         // Retornar una respuesta JSON con éxito
    return response()->json(['success' => true, 'message' => 'Categoría agregada exitosamente.']);
}

    public function edit($id)
{
    // Obtener la categoría que se va a editar
    $category = Category::findOrFail($id);
    
    // Obtener todas las categorías
    $categories = Category::all();

    // Obtener otras variables necesarias para la vista del dashboard
    $users = User::all();
    $orders = Order::all();
    $supportTickets = SupportTicket::all();
    $products = Product::all();

    // Agrega cualquier otra variable que necesite la vista del dashboard

    // Retornar la vista con todas las variables necesarias
    return view('dashboard', compact('category', 'categories', 'users', 'orders', 'supportTickets', 'products'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => true]);
        }
}
