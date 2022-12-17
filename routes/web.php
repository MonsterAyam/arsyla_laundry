<?php

use App\Models\User;
use App\Models\Invoice;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CartController;
use App\Models\JenisPengeluaran;

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

Route::get('/', function () {
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('index', [
        "baru" => Invoice::where('status', 'menunggu')->count(),
        "salah" => Invoice::where('status', 'salah input')->count(),
        "selesai" => Invoice::where('status', 'selesai')->count(),
        "diambil" => Invoice::where('status', 'diambil')->count()
    ]);
})->middleware('auth');



Route::get('/dashboard/laporan', function () {
    return view('laporan_laba/rugi.index', [
        "pendapatan" => Invoice::select(
            "id",
            DB::raw("(sum(grand_total)) as total_pendapatan"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as per_bulan")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->get(),
        "kerugian" => JenisPengeluaran::select(
            "id",
            DB::raw("(sum(total_harga)) as total_kerugian"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as per_bulan")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->get()
    ]);
})->middleware('admin');




Route::post('/dashboard/cart', [CartController::class, 'tambah']);
Route::get('/dashboard/cart/show', [CartController::class, 'show']);
Route::get('/dashboard/cart/hapus/{id}', [CartController::class, 'delete']);
Route::post('/dashboard/cart/transaksi', [CartController::class, 'transaksi']);

Route::get('/dashboard/invoice/detail{id}', function ($id) {
    return view('transaksi.invoice_detail', [
        "data" => Transaksi::where('invoice_id', $id)->get(),
        "data_pg" => Invoice::where('id', $id)->first()
    ]);
});

Route::get('/dashboard/invoice/print/{id}', [InvoiceController::class, 'print']);


Route::resource('/dashboard/user', UserController::class)->middleware('admin');
Route::resource('/dashboard/master/pelanggan', PelangganController::class)->middleware('auth');
Route::resource('/dashboard/master/jenis_pengeluaran', JenisPengeluaranController::class)->middleware('admin');
Route::resource('/dashboard/master/produk', ProdukController::class)->middleware('admin');
Route::resource('/dashboard/invoice', InvoiceController::class)->middleware('auth');
