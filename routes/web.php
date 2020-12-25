<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'loginUser']);
Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [RegisterController::class, 'logout']);
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/products/{id}/update', [ProductController::class, 'update']);
    Route::get('/category', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
});