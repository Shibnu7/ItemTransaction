<?php

use App\Http\Controllers\OrderController;

Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders.orders'); // Route to show all orders
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show'); // Route to show a specific order
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Route to create a new order
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Route to delete an order
Route::get('/items', [OrderController::class, 'showItems'])->name('items.show');
