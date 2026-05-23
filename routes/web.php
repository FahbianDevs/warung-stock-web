<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inventory\ProductController;
use App\Http\Controllers\Inventory\StockMovementController;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class)->names('products');
Route::resource('stock-movements', StockMovementController::class)
    ->only(['index', 'create', 'store'])
    ->names('stock_movements');
