<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

// Rutas para MLB
// Route::get('/mlb/dodgers', function () {
//     return view('teams.mlb.dodgers');
// });

Route::get('/mlb/mets', function () {
    return view('teams.mlb.mets');
});


Route::get('/mlb/redsox', function () {
    return view('teams.mlb.redsox');
});

Route::get('/mlb/marlins', function () {
    return view('teams.mlb.marlins');
});

Route::get('/mlb/dodgers', 'App\Http\Controllers\ProductController@showDodgersProducts')->name('dodgers.products');

Route::get('/cart', 'App\Http\Controllers\ProductController@viewCart')->name('cart');

Route::post('/cart/add', 'App\Http\Controllers\ProductController@addToCart')->name('cart.add');
// Endpoint para eliminar un producto del carrito
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

