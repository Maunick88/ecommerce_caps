<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


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

    public function showProductsByCategoryName($league, $categoryName)
    {
        // Buscar la categoría por su nombre
        $category = Category::where('name', $categoryName)->first();
    
        // Verificar si la categoría existe
        if (!$category) {
            return redirect()->back()->with('error', 'Categoría no encontrada.');
        }

        // Obtener productos filtrados por el id de la categoría encontrada
        $products = Product::where('category_id', $category->id)->get();

        // Determinar la liga y construir la ruta de la vista
        $viewPath = 'teams.' . strtolower($league) . '.' . strtolower($categoryName);
    
        // Verificar si la vista existe
        if (!view()->exists($viewPath)) {
            return redirect()->back()->with('error', 'Vista no encontrada.');
        }
    
        // Retornar la vista con los productos
        return view($viewPath, compact('products'));
    }
    
     

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

public function store(Request $request)
{
    // Validar los datos entrantes
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|string|max:255', // Validación del texto de la imagen
    ]);

    // Crear el producto
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'image' => $request->image, // Guardar el texto ingresado
       ]);

   // Retornar una respuesta JSON con éxito
   return response()->json(['success' => true, 'message' => 'Producto agregado exitosamente.']);
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    // Validar los datos entrantes
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|string|max:255', // Validación del texto de la imagen
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Producto actualizado exitosamente.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return response()->json(['success' => true]);
}


}