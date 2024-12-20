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
    /**
     * Mostrar productos filtrados por múltiples IDs de categoría.
     *
     * @param string $ids Cadena de IDs de categoría separados por comas (e.g., "5,6,7,8")
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function GetNflTeams($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.nfl', compact('products'));
    }
    public function GetNbaTeams($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.nba', compact('products'));
    }
    public function GetBobCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.bob', compact('products'));
    }
    public function GetRenCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.ren', compact('products'));
    }
    public function GetRaceCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.race', compact('products'));
    }
    public function GetFutCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.fut', compact('products'));
    }
    public function GetMexCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.mex', compact('products'));
    }
    public function GetMlbCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.mlb', compact('products'));
    }
    public function GetLmbCaps($ids)
    {
        // Separar los IDs por comas y convertirlos a un array de enteros
        $categoryIds = array_map('intval', explode(',', $ids));

        // Validar que cada ID corresponda a una categoría existente
        $validCategories = Category::whereIn('id', $categoryIds)->pluck('id')->toArray();

        // Verificar si todos los IDs proporcionados existen
        if (count($validCategories) !== count($categoryIds)) {
            // Identificar los IDs no válidos
            $invalidIds = array_diff($categoryIds, $validCategories);
            return redirect()->back()->with('error', 'IDs de categoría inválidos o no existentes: ' . implode(', ', $invalidIds));
        }

        // Obtener los productos que pertenecen a las categorías especificadas
        $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();

        // Retornar la vista con los productos filtrados
        // Puedes usar la misma vista 'welcome' o crear una específica
        return view('indexViews.lmb', compact('products'));
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
        // Verifica si el usuario ha iniciado sesión
        if (!auth()->check()) {
            return response()->json(['message' => 'Debe iniciar sesión para agregar productos al carrito.'], 401);
        }
    
        // Obtiene el carrito de la sesión o inicializa uno vacío
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Obtén la cantidad, por defecto 1
    
        // Agrega o actualiza el producto en el carrito
        if (!isset($cart[$productId])) {
            $cart[$productId] = ["quantity" => $quantity];
        } else {
            $cart[$productId]['quantity'] += $quantity; // Actualiza la cantidad sumándola
        }
    
        // Guarda el carrito en la sesión
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
        // Define el límite máximo de unidades por producto
        $stockLimit = 30;
    
        // Valida los datos de entrada
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        // Verifica que la cantidad no exceda el límite de stock
        if ($quantity > $stockLimit) {
            return response()->json([
                'message' => 'No hay suficiente stock disponible. El límite es de ' . $stockLimit . ' unidades.'
            ], 400);
        }
    
        // Actualiza la cantidad del producto en el carrito
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
    
            return response()->json(['message' => 'Cantidad actualizada correctamente.', 'cart' => $cart]);
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
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Validación de la imagen
    ]);

    // Manejar la subida de la imagen
    if ($request->hasFile('image')) {
        // Obtener el archivo de imagen
        $imageFile = $request->file('image');
        
        // Leer el contenido binario del archivo
        $imageContent = file_get_contents($imageFile->getRealPath());
    }

    // Crear el producto y guardar la imagen como BLOB en la base de datos
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'image' => $imageContent, // Guardar el binario de la imagen en la base de datos
    ]);

    // Retornar una respuesta JSON con éxito
    return response()->json(['success' => true, 'message' => 'Producto agregado exitosamente.']);
}

public function showImage($id)
{
    // Obtener el producto por su ID
    $product = Product::findOrFail($id);

    // Verificar si el producto tiene una imagen
    if (!$product->image) {
        abort(404, 'Imagen no encontrada.');
    }

    // Retornar la imagen como una respuesta binaria
    return response($product->image)
        ->header('Content-Type', 'image/jpeg'); // Cambia el tipo de imagen si es necesario
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validación de la imagen (puede ser nulo si no se actualiza)
    ]);

    // Obtener el producto por su ID
    $product = Product::findOrFail($id);

    // Si se sube una nueva imagen, procesarla
    if ($request->hasFile('image')) {
        // Obtener la nueva imagen
        $imageFile = $request->file('image');
        
        // Leer el contenido binario de la imagen
        $imageContent = file_get_contents($imageFile->getRealPath());

        // Actualizar el campo 'image' con el nuevo contenido binario
        $product->image = $imageContent;
    }

    // Actualizar los otros campos
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;

    // Guardar los cambios en la base de datos
    $product->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Producto actualizado exitosamente.');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return response()->json(['success' => true]);
}


}