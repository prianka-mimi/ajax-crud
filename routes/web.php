<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// my custom part start
use App\Http\Controllers\ProductController;
// my custom part end

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

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// my custom part start
Route::get('/', [ProductController::class, 'products'])->name('products');
Route::post('/add.product', [ProductController::class, 'addProduct'])->name('add.product');
Route::post('/update.product', [ProductController::class, 'updateProduct'])->name('update.product');
Route::post('/delete.product', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data', [ProductController::class, 'pagination']);
Route::get('/search.product', [ProductController::class, 'searchProduct'])->name('search.product');
// my custom part end

require __DIR__.'/auth.php';
