<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();

    }

    //productos dodgers
    public function showDodgersProducts()
    {
        // Obtener productos filtrados por category_id
        $products = Product::where('category_id', 11)->get();

        // Retornar la vista con los productos
        return view('teams.mlb.dodgers', compact('products'));
    }
    //end producto id

    //productos marlins
    public function showmarlinsProducts()
    {
        // Obtener productos filtrados por category_id
        $products = Product::where('category_id', 12)->get();

        // Retornar la vista con los productos
        return view('teams.mlb.marlins', compact('products'));
    }
    //end producto id

    public function viewCart()
    {
        $cart = session()->get('cart', []);

        // Obtener los detalles de los productos desde la base de datos
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        return view('cart', compact('products', 'cart'));
    }

    // Método para agregar un producto al carrito
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        if (!isset($cart[$productId])) {
            $cart[$productId] = ["quantity" => 1];
        } else {
            $cart[$productId]['quantity']++;
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Producto agregado al carrito!', 'cart' => $cart]);
    }

    // Método para eliminar un producto del carrito
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Producto eliminado del carrito!', 'cart' => $cart]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Validar que la cantidad sea mayor a cero
        if ($quantity > 0 && isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada!');
    }

    public function storeReview(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);
    
        // Crear la reseña utilizando el modelo Review
        Review::create([
            'user_id' => auth()->id(), // Asegúrate de que el usuario esté autenticado
            'product_id' => $validated['product_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);
    
        return response()->json(['message' => 'Reseña creada con éxito'], 201);
    }
}

