<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SupportTicket;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/americano/{ids?}', 'App\Http\Controllers\ProductController@GetNflTeams');
Route::get('/basket/{ids?}', 'App\Http\Controllers\ProductController@GetNbaTeams');

Route::get('/mexico/{ids?}', 'App\Http\Controllers\ProductController@GetMexCaps');

//resumen de pedido
Route::get('/order/summary', 'App\Http\Controllers\OrderController@showSummary')->name('order.summary');
Route::get('/order/capturey', 'App\Http\Controllers\OrderController@capturePayPalPayment')->name('order.capture');
Route::post('/order/process', 'App\Http\Controllers\OrderController@processOrder')->name('order.process');

Route::get('/order/paypal', function () {
    return view('order.paypal');
});
Route::post('/order/save', 'App\Http\Controllers\PaymentController@saveOrder')->name('order.save');

Route::get('/thanks', [PaymentController::class, 'thanks'])->name('order.thanks');

Route::get('/order/details/{id}', [PaymentController::class, 'details'])->name('order.details');

Route::post('/reviews', 'App\Http\Controllers\ProductController@storeReview')->name('reviews.store');
Route::get('/reviews/{productId}', 'App\Http\Controllers\ProductController@getProductReviews')->name('reviews.get');

Route::get('/product/image/{id}', [ProductController::class, 'showImage'])->name('product.image');

Route::get('/footer/mision', function () {
    return view('footer.mision');
});
Route::get('/footer/vision', function () {
    return view('footer.vision');
});
Route::get('/footer/valores', function () {
    return view('footer.valores');
});
Route::get('/footer/objetivos', function () {
    return view('footer.obj');
});
Route::get('/footer/acerca', function () {
    return view('footer.acerca');
});
Route::get('/footer/soporte', function () {
    return view('footer.soporte');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/support/create', [SupportTicketController::class, 'create'])->name('support.create');
    Route::post('/support/store', [SupportTicketController::class, 'store'])->name('support.store');
});
Route::get('/footer/docs', function () {
    return view('footer.docs');
});
Route::get('/footer/news', [NewsController::class, 'index'])->name('news');
Route::get('/footer/policy', function () {
    return view('footer.privacy_policy');
})->name('privacy_policy');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        $orders = Order::with(['items', 'items.product'])->get();
        $orderItems = OrderItem::with(['order', 'product'])->get();
        $supportTickets = SupportTicket::with(['user', 'order'])->get();
        $products = Product::with(['category', 'reviews'])->get();
        $categories = Category::with('products')->get();
        $reviews = Review::with(['product', 'user'])->get();
        $users = User::with('reviews')->get();

        // Datos para gráficos adicionales
        $salesByMonth = Order::selectRaw('YEAR(created_at) year, MONTH(created_at) month, SUM(total_price) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')  // Asegurar ordenación ascendente
            ->orderBy('month', 'asc')  // Asegurar ordenación ascendente
            ->get();

        $categoriesDistribution = $categories->mapWithKeys(function ($category) {
            return [$category->name => $category->products->count()];
        });

        $ratingDistribution = Review::selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->orderBy('rating', 'asc')  // Asegurar ordenación ascendente
            ->get()
            ->pluck('count', 'rating');

        $activeUsers = User::withCount('reviews')
            ->orderBy('reviews_count', 'desc')  // Asegurar ordenación descendente para los más activos
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'orders', 'orderItems', 'supportTickets', 'products', 'categories', 'reviews', 'users',
            'salesByMonth', 'categoriesDistribution', 'ratingDistribution', 'activeUsers'
        ));
    }
    
    return redirect('/')->with('error', 'Acceso denegado.');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Ruta para mostrar el formulario de edición de productos
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Ruta para actualizar el producto
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Ruta para eliminar el producto
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Rutas para la gestión de categorías
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//vrutas de equipo
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('index');

Route::get('/{league}/{categoryName}', [ProductController::class, 'showProductsByCategoryName'])->name('products.byCategoryName');
    //end rutas de equipo





//cart
Route::get('/cart', 'App\Http\Controllers\ProductController@viewCart')->name('cart');
Route::post('/cart/add', 'App\Http\Controllers\ProductController@addToCart')->name('cart.add');
Route::post('/cart/remove', 'App\Http\Controllers\ProductController@removeFromCart')->name('cart.remove');
Route::post('/cart/update', 'App\Http\Controllers\ProductController@updateCart')->name('cart.update');


// Ruta para la confirmación de éxito
Route::get('/order/success', function () {
    return view('order.success');
})->name('order.success');

