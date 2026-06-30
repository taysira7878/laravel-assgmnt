<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class);

Route::get('/categories', [PageController::class, 'categories'])->name('categories');
Route::get('/analytics', [PageController::class, 'analytics'])->name('analytics');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');
