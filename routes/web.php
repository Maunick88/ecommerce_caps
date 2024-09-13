<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/order/paypal', function () {
    return view('order.paypal');
});
Route::post('/order/save', 'App\Http\Controllers\PaymentController@saveOrder')->name('order.save');

Route::get('/thanks', [PaymentController::class, 'thanks'])->name('order.thanks');

Route::get('/order/details/{id}', [PaymentController::class, 'details'])->name('order.details');

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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('dashboard');
    }
    return redirect('/')->with('error', 'Acceso denegado.');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//vrutas de equipo
Route::get('/', 'App\Http\Controllers\ProductController@showIndexProducts')->name('index');
Route::get('/mlb/dodgers', 'App\Http\Controllers\ProductController@showDodgersProducts')->name('dodgers.products');
Route::get('/mlb/marlins', 'App\Http\Controllers\ProductController@showmarlinsProducts')->name('marlins.products');
//end rutas de equipo

Route::post('/reviews', 'App\Http\Controllers\ProductController@storeReview')->name('reviews.store');
Route::get('/reviews/{productId}', 'App\Http\Controllers\ProductController@getProductReviews')->name('reviews.get');



//cart
Route::get('/cart', 'App\Http\Controllers\ProductController@viewCart')->name('cart');
Route::post('/cart/add', 'App\Http\Controllers\ProductController@addToCart')->name('cart.add');
Route::post('/cart/remove', 'App\Http\Controllers\ProductController@removeFromCart')->name('cart.remove');
Route::post('/cart/update', 'App\Http\Controllers\ProductController@updateCart')->name('cart.update');

//resumen de pedido
Route::get('/order/summary', 'App\Http\Controllers\OrderController@showSummary')->name('order.summary');
Route::get('/order/capturey', 'App\Http\Controllers\OrderController@capturePayPalPayment')->name('order.capture');
Route::post('/order/process', 'App\Http\Controllers\OrderController@processOrder')->name('order.process');

// Ruta para la confirmación de éxito
Route::get('/order/success', function () {
    return view('order.success');
})->name('order.success');

