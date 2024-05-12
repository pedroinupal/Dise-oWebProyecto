<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/public_clients', [OrderController::class, 'public_clients'])->name('orders.public_clients');
Route::post('/public_orders/{id}', [OrderController::class, 'public_orders'])->name('orders.public_orders');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


 
    
    Route::resource('/orders', OrderController::class);
    Route::resource('/orders_all', OrderController::class);
    Route::resource('/orders_warehouse', OrderController::class);
    Route::resource('/orders_route', OrderController::class);
    Route::resource('/employees',WorkerController::class);
    Route::resource('/customers',CustomerController::class);
    Route::resource('/suppliers',SupplierController::class);
    Route::resource('/products',ProductController::class);

    Route::post('/orders/{id}/update_status/{status}', [OrderController::class, 'update_status'])->name('orders.update_status');
    Route::post('/orders/{id}/update_photo/{photo}', [OrderController::class, 'update_photo'])->name('orders.update_photo');

    
});

require __DIR__.'/auth.php';
