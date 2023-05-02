<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('products', 'App\Http\Controllers\ProductController')->middleware(['auth']);
Route::put('/products/{id}/disable', [ProductController::class, 'editImage'])->middleware(['auth']);
Route::post('/products/create', [ProductController::class, 'store'])->middleware(['auth']);

Route::resource('categories', 'App\Http\Controllers\CategoryController')->middleware(['auth']);
Route::post('/categories/create', [CategoryController::class, 'store'])->middleware(['auth']);

Route::resource('subcategories', 'App\Http\Controllers\SubcategoryController')->middleware(['auth']);
Route::post('/subcategories/create', [SubcategoryController::class, 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';