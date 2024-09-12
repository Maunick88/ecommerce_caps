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
    public function showIndexProducts()
    {
        // Obtener productos filtrados por category_id
        $products = Product::where('category_id', 1)->get();

        // Retornar la vista con los productos
        return view('welcome', compact('products'));
    }
    //productos dodgers
    public function showDodgersProducts()
    {
        // Obtener productos filtrados por category_id
        $products = Product::where('category_id', 1)->get();

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

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Obtén la cantidad, por defecto 1
    
        // Agrega o actualiza el producto en el carrito
        if (!isset($cart[$productId])) {
            $cart[$productId] = ["quantity" => $quantity];
        } else {
            $cart[$productId]['quantity'] += $quantity; // Actualiza la cantidad sumándola
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
    
        // Verifica que la cantidad sea un número válido y mayor a 0
        if ($quantity <= 0) {
            return response()->json(['message' => 'La cantidad debe ser mayor que 0.'], 400);
        }
    
        // Actualiza la cantidad del producto en el carrito
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
    
            return response()->json(['message' => 'Cantidad actualizada correctamente.']);
        }
    
        return response()->json(['message' => 'Producto no encontrado en el carrito.'], 404);
    }

    public function storeReview(Request $request)
    {
      // Validar la entrada
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:500'
    ]);

    // Lógica para guardar la reseña
    Review::create([
        'product_id' => $request->product_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
        'user_id' => auth()->id(), // O cualquier lógica para obtener el ID del usuario
    ]);

    // Devuelve una respuesta JSON
    return response()->json(['message' => '¡Gracias por tu reseña!']);

    }

    public function getProductReviews($productId)
{
    // Obtén las reseñas para el producto
    $reviews = Review::where('product_id', $productId)->get();

    // Devuelve las reseñas en formato JSON
    return response()->json($reviews);
}

}