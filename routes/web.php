<?php

use App\Http\Controllers\BasicControler;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', ['App\Http\Controllers\BasicController' , 'index'])->name('home');
Route::get('/sale', ['App\Http\Controllers\BasicController', 'sale'])->name('Sale');
Route::get('/about', ['App\Http\Controllers\BasicController', 'about'])->name('about');

Route::get('/contact/123', ['App\Http\Controllers\BasicController', 'contact'])->name('contact');
Route::post('/contact/123', ['App\Http\Controllers\BasicController', 'submit'])->name('contact.post');


Route::get('/register', ['App\Http\Controllers\AuthController', 'RegisterForm'])->name('register');
Route::post('/register', ['App\Http\Controllers\AuthController', 'register']);


Route::get('/login', ['App\Http\Controllers\AuthController', 'LoginForm'])->name('login');
Route::post('/login', ['App\Http\Controllers\AuthController', 'login']);



Route::middleware('auth')->group(function () {
    Route::view('/profile', 'static.profile')->name('profile');
    Route::post('/logout', ['App\Http\Controllers\AuthController', 'logout'])->name('logout');
});


Route::get('/catalog', ['App\Http\Controllers\ProductController', 'catalog'])->name('catalog');
Route::get('/product/{id}', ['App\Http\Controllers\ProductController', 'show'])->name('product.show');


Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', ['App\Http\Controllers\CartController', 'index'])->name('index');
    Route::post('/add', ['App\Http\Controllers\CartController', 'add'])->name('add');
    Route::post('/update', ['App\Http\Controllers\CartController', 'update'])->name('update');
    Route::post('/remove', ['App\Http\Controllers\CartController', 'remove'])->name('remove');
    Route::post('/clear', ['App\Http\Controllers\CartController', 'clear'])->name('clear');
});


Route::prefix('order')->name('order.')->group(function () {
    Route::get('/checkout', ['App\Http\Controllers\OrderController', 'checkout'])->name('checkout');
    Route::post('/store', ['App\Http\Controllers\OrderController', 'store'])->name('store');
    Route::get('/success/{id}', ['App\Http\Controllers\OrderController', 'success'])->name('success');
    Route::get('/history', ['App\Http\Controllers\OrderController', 'history'])->name('history');
    Route::get('/{id}', ['App\Http\Controllers\OrderController', 'show'])->name('show');
});



Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', ['App\Http\Controllers\Admin\AdminController', 'index'])->name('index');
    

    Route::get('/products', ['App\Http\Controllers\Admin\ProductController', 'index'])->name('products');
    Route::get('/products/create', ['App\Http\Controllers\Admin\ProductController', 'create'])->name('product.create');
    Route::post('/products', ['App\Http\Controllers\Admin\ProductController', 'store'])->name('product.store');
    Route::get('/products/{id}/edit', ['App\Http\Controllers\Admin\ProductController', 'edit'])->name('product.edit');
    Route::put('/products/{id}', ['App\Http\Controllers\Admin\ProductController', 'update'])->name('product.update');
    Route::delete('/products/{id}', ['App\Http\Controllers\Admin\ProductController', 'destroy'])->name('product.delete');

    Route::get('/orders', ['App\Http\Controllers\Admin\OrderController', 'index'])->name('orders');
    Route::get('/orders/{id}', ['App\Http\Controllers\Admin\OrderController', 'show'])->name('order.show');
    Route::post('/orders/{id}/status', ['App\Http\Controllers\Admin\OrderController', 'updateStatus'])->name('order.status');
    

    Route::get('/users', ['App\Http\Controllers\Admin\UserController', 'index'])->name('users');
    Route::post('/users/{id}/toggle-admin', ['App\Http\Controllers\Admin\UserController', 'toggleAdmin'])->name('user.toggle-admin');
});