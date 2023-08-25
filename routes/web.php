<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Models\Penitip;
use App\Models\Products;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('admin.dashboard.index');
});

// Route::get('/barang', function () {
//     return view('admin.products.index');
// });
// Route::get('/tambahbarang', function () {
//     return view('products/create');
// });
// Route::get('/stok', function () {
//     return view('admin.stok.index');
// });


Route::resource('products', ProductsController::class);