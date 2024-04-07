<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/orders/new', function () {
    return view('orders.neworder');
});

Route::get('/employees/new', function () {
    return view('workers.newemployee');
});

Route::get('/customers/new', function () {
    return view('customers.newcustomer');
});

Route::get('/suppliers/new', function () {
    return view('suppliers.newsupplier');
});

Route::get('/products/new', function () {
    return view('products.newproduct');
});

Route::get('/products/buy', function () {
    return view('products.buyproduct');
});

Route::get('/orders_all', [OrderController::class, 'showOrders'])->name('orders.all');
Route::get('/orders_warehouse', [OrderController::class, 'showOrders'])->name('orders.warehouse');
Route::get('/orders_route', [OrderController::class, 'showOrders'])->name('orders.route');


Route::resource('/employees',WorkerController::class);
Route::resource('/customers',CustomerController::class);
Route::resource('/suppliers',SupplierController::class);
Route::resource('/products',ProductController::class);