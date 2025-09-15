<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectRController;
use App\Http\Controllers\ProUpdateProfileController;
use App\Http\Controllers\productController;
use App\Http\Controllers\proupdateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProcheckoutController;
use App\Http\Controllers\proLoginController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlacedOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;



// Public Routes
Route::view('/', 'welcome');
Route::view('/signin', 'signin');
Route::view('/stock', 'stock');
Route::view('/ecom', 'ecom');
Route::view('/dash', 'dash');
Route::view('/check', 'check');
Route::view('/pro-header', 'pro-header');
Route::view('/pro-about', 'pro-about');
Route::view('/projectF', 'projectF');
Route::view('/pro-category', 'pro-category');
Route::view('/pro-navbar', 'pro-navbar');
Route::view('/pro-home', 'pro-home');
Route::view('/pro-logout', 'pro-logout');
Route::view('/pro-placed-orders', 'pro-placed-orders');
Route::view('/pro-quickview', 'pro-quickview');
Route::view('/pro-serch', 'pro-serch');
Route::view('/pro-user', 'pro-user');
Route::view('/data', 'data');

// Signup Routes
Route::get('/act', [AuthController::class, 'showSignupForm'])->name('act.form');
Route::post('/act', [AuthController::class, 'register'])->name('act.submit');
Route::view('/success', 'success')->name('act.success');




Route::get('/pro-serch', [SearchController::class, 'search'])->name('pro-serch');
Route::post('/wishlist', [SearchController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/cart', [SearchController::class, 'addToCart'])->name('cart.add');





Route::get('/pro-category', [CategoryController::class, 'index'])->name('pro-category');
Route::post('/pro-category', [CategoryController::class, 'store']);



Route::prefix('workers')->group(function () {
    Route::get('/', [WorkersController::class, 'showSignupForm'])->name('workers.form');
    Route::post('/', [WorkersController::class, 'register'])->name('workers.submit');
    Route::view('/success', 'worksuc')->name('workers.worksuc');
});

Route::prefix('projectR')->group(function () {
    Route::get('/', [ProjectRController::class, 'showSignupForm'])->name('projectR.form');
    Route::post('/', [ProjectRController::class, 'register'])->name('projectR.submit');
    Route::view('/success', 'pro-success')->name('projectR.pro-success');
});

Route::prefix('pro-contact')->group(function () {
    Route::get('/', [ContactController::class, 'showSignupForm'])->name('pro-contact.form');
    Route::post('/', [ContactController::class, 'register'])->name('pro-contact.submit');
    Route::view('/success', 'pro-success')->name('pro-contact.success');
});

Route::post('/pro-contact-submit', [ContactController::class, 'register'])->name('contact.submit');
Route::get('/pro_contacts', [ContactController::class, 'index'])->name('message.list');
Route::delete('/messages/{id}', [messageController::class, 'destroy'])->name('message.delete');

Route::prefix('pro-update')->group(function () {
    Route::get('/', [proupdateController::class, 'showSignupForm'])->name('pro-update.form');
    Route::post('/', [proupdateController::class, 'register'])->name('pro-update.submit');
    Route::get('/edit/{id}', [proupdateController::class, 'edit'])->name('pro-update.edit');
    Route::view('/success', 'pro-success')->name('pro-update.pro-success');
});

Route::prefix('pro-update-profile')->group(function () {
    Route::get('/', [ProUpdateProfileController::class, 'showSignupForm'])->name('pro-update-profile.form');
    Route::post('/', [ProUpdateProfileController::class, 'register'])->name('pro-update-profile.submit');
    Route::view('/success', 'pro-success')->name('pro-update-profile.pro-success');
});



Route::prefix('pro-wishlist')->group(function () {
    // Show wishlist
    Route::get('/', [WishlistController::class, 'index'])->name('pro-wishlist.index');

    // Add to wishlist
    Route::post('/store', [WishlistController::class, 'store'])->name('pro-wishlist.store');

    // Success page (optional)
    Route::view('/success', 'pro-success')->name('pro-wishlist.success');

    // Delete item
    Route::get('/delete/{id}', [WishlistController::class, 'destroy'])->name('wishlist.delete');

    // Clear all
    Route::get('/clear', [WishlistController::class, 'clear'])->name('wishlist.clear');

    Route::get('/product/{pid}', [productController::class, 'view'])->name('product.view');
    Route::post('/product/{pid}/add-to-cart', [productController::class, 'addToCart'])->name('product.addToCart');

});


// Product Routes



Route::get('/pro-product', [productController::class, 'index'])->name('pro-product');
Route::post('/pro-product', [productController::class, 'store'])->name('pro-product.submit');
Route::put('/pro-product/{id}', [productController::class, 'update'])->name('pro-product.update');
Route::get('/pro-update/{id}', [productController::class, 'edit'])->name('pro-update.edit');
Route::delete('/pro-product/delete/{id}', [productController::class, 'destroy'])->name('pro-product.delete');

// Cart Routes
Route::get('/pro-cart', [CartsController::class, 'showCart'])->name('cart.show');
Route::post('/update-cart', [CartsController::class, 'updateCart'])->name('cart.update');
Route::get('/remove-from-cart/{id}', [CartsController::class, 'remove'])->name('cart.remove');
Route::post('/cart.add', [CartsController::class, 'addToCart'])->name('cart.add');

// Shop and Checkout Routes
Route::get('/pro-shop', [ShopController::class, 'showShop'])->name('pro-shop');
Route::post('/pro-shop/submit', [ShopController::class, 'handleActions'])->name('pro-shop.submit');
Route::get('/pro-checkout', [ProcheckoutController::class, 'showCheckout'])->name('pro-checkout');
Route::post('/pro-checkout', [ProcheckoutController::class, 'placeOrder'])->name('pro-checkout.submit');

// Order Routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', [ProcheckoutController::class, 'showOrders'])->name('orders');
    Route::patch('/orders/{id}', [ProcheckoutController::class, 'updateOrder'])->name('orders.update');
    Route::delete('/orders/{id}', [ProcheckoutController::class, 'deleteOrder'])->name('orders.delete');
});

// Login Routes
Route::get('/pro-login', [proLoginController::class, 'showLoginForm'])->name('pro-login.form');
Route::post('/pro-login', [proLoginController::class, 'login'])->name('pro-login.submit');
Route::post('/logout', [proLoginController::class, 'logout'])->name('logout');

// Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/pro-dashboard', [DashboardController::class, 'index'])->name('pro-dashboard');
});

// Debug Route
Route::get('/debug-db', [OrderController::class, 'debugDb'])->name('debug_db');

// Success Route for Checkout
Route::get('/pro-success', function () {
    return view('pro-success');
})->name('pro-success');




Route::get('/payment', function () {
    return view('payment'); // make sure resources/views/payment.blade.php exists
})->name('payment.page');

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');



Route::get('/pro-home', [homeController::class, 'index']);
Route::post('/pro-home/handleForm', [homeController::class, 'handleForm']);






Route::middleware('auth')->group(function () {
    Route::get('/pro-placed-orders', [PlacedOrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}', [PlacedOrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [PlacedOrderController::class, 'destroy'])->name('orders.delete');
});


Route::post('/stripe-checkout', [PaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('stripe.success');
Route::get('/payment-cancel', [PaymentController::class, 'cancel'])->name('stripe.cancel');

Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::get('/stripe', function () {
    // Pass cart total to stripe page
    $cart_total = session('cart_total', 100); // or fetch from DB/Auth user cart
    return view('payment', ['cart_grand_total' => $cart_total]);
})->name('stripe.page');