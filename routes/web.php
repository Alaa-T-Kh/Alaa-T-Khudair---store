<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductController::class, 'store']);
Route::get('products/edit/{id}', [ProductController::class, 'edit']);
Route::get('products/delete/{id}', [ProductController::class, 'destroy']);
Route::patch('products/update/{id}', [ProductController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store']);
Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
Route::get('categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::patch('categories/update/{id}', [CategoryController::class, 'update']);

Route::get('/', [FrontController::class, 'index']);


Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
Route::get('orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
Route::patch('orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::get('my-orders', [OrderController::class, 'myOrders'])->name('my-orders');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
