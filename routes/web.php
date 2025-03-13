<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\OrderController;

Route::get('/products', [ProductController::class, 'index']); 
Route::post('/products', [ProductController::class, 'store']); 
Route::get('/products/{id}', [ProductController::class, 'show']); 
Route::put('/products/{id}', [ProductController::class, 'update']); 
Route::delete('/products/{id}', [ProductController::class, 'destroy']); 

Route::get('/users', [UserController::class, 'index']); 
Route::post('/users', [UserController::class, 'store']); 
Route::get('/users/{id}', [UserController::class, 'show']); 
Route::put('/users/{id}', [UserController::class, 'update']); 
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']); 
Route::post('/orders', [OrderController::class, 'store']); 
Route::get('/orders/{id}', [OrderController::class, 'show']); 
Route::put('/orders/{id}', [OrderController::class, 'update']); 
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);