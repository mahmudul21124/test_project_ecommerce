<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/testing', function () {
//     return view('admin.dashboard2');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Cart Routes

Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'remove']);

Route::get('/cart/count', function () {
    return response()->json([
        'count' => session('cart') ? collect(session('cart'))->sum('quantity') : 0
    ]);
})->name('cart.count');


// Public checkout route
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout-success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/order-success/{order}', function (App\Models\Order $order) {
    return view('order-success', compact('order'));
})->name('order.success');


Route::get('/order/{order}/invoice', [CheckoutController::class, 'invoice'])->name('order.invoice');

Route::prefix('customer')->middleware(['auth', 'role:Customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/orders', [CustomerController::class, 'orders'])->name('customer.orders');
});

// Keep my-orders protected
Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [CustomerOrderController::class, 'myOrders']);
});

// Admin Routes

Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/orders', [AdminOrderController::class, 'index']);
    Route::resource('products', ProductController::class)->except(['show']);
});


// Public product detail route (no middleware)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
