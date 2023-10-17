<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\Absenkeluar;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenitipController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Models\Chart;
use App\Models\Penitip;
use App\Models\Products;
use App\Models\Stocks;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'index']);
    Route::get('/dashboard', [LoginController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/pos', [LoginController::class, 'petugas'])->middleware('userAkses:petugas');
    Route::get('/logout', [SesiController::class, 'logout']);


    Route::get('/printbarang', function () {
        $print = Products::all();
        return view('admin.products.print', compact('print'));
    });
    Route::get('/printstock', function () {
        $print = Products::all();
        return view('admin.stocks.print', compact('print'));
    });

    Route::resource('user', UserController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('stocks', StocksController::class);
    Route::resource('sellers', SellersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('pos', CartController::class);
    Route::resource('detail', DetailController::class);
    Route::resource('stok', StokController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('pplg', SiswaController::class);
    Route::resource('absen', AbsenController::class);
    Route::resource('absens', Absenkeluar::class);
    Route::get('/absenmasuk', [AbsenController::class, 'absenmasuk']);
    Route::get('/absenkeluar', [AbsenController::class, 'absenkeluar']);
    Route::get('/filter', [DetailController::class, 'filter']);
    Route::get('/rpl', [DetailController::class, 'rpl']);
    Route::get('/report', [LaporanController::class, 'report']);
    Route::get('/print', [PrintController::class, 'printrpl']);
    Route::get('/penjualan', [PrintController::class, 'penjualan']);
    Route::get('/label', [PrintController::class, 'label']);
    Route::get('/filterlaporan', [LaporanController::class, 'filter']);
    Route::get('/filterreport', [LaporanController::class, 'filterreport']);
});
