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
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


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

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('index', [
        "baru" => Invoice::where('status', 'belum dibayar')->count(),
        "salah" => Invoice::where('status', 'salah input')->count(),
        "selesai" => Invoice::where('status', 'sudah dibayar')->count(),
        "diambil" => Invoice::where('status', 'diambil')->count()
    ]);
})->middleware('auth');


Route::get('/dashboard/laporan', function (Request $request) {
    if ($request->get('tanggal_dari') && $request->get('tanggal_sampai')) {
        return view('laporan_laba/rugi.index', [
            "pendapatan" => DB::table('invoices')
                ->select(DB::raw('DATE(created_at) as per_bulan, SUM(grand_total) as total_pendapatan'))
                ->where(function ($query) use ($request) {
                    $query->where('created_at', '>=', $request->get('tanggal_dari'))
                        ->where('created_at', '<=', $request->get('tanggal_sampai'))
                        ->where(function ($query) {
                            $query->where('status', 'sudah dibayar')
                                ->orWhere('status', 'diambil');
                        });
                })
                ->groupBy('per_bulan')
                ->get(),
            "kerugian" => DB::table('jenis_pengeluarans')
                ->select(DB::raw('DATE(created_at) as per_bulan, SUM(total_harga) as total_kerugian'))
                ->where('created_at', '>=', $request->get('tanggal_dari'))
                ->where('created_at', '<=', $request->get('tanggal_sampai'))
                ->groupBy('per_bulan')
                ->get()
        ]);
    } else {
        return view('laporan_laba/rugi.index', [
            "pendapatan" => Invoice::select(
                "id",
                DB::raw("(sum(grand_total)) as total_pendapatan"),
                DB::raw("(DATE_FORMAT(tanggal_dibayar, '%d-%m-%Y')) as per_bulan")
            )
                ->orderBy('tanggal_dibayar')
                ->where('status', 'sudah dibayar')->orWhere('status', 'diambil')
                ->groupBy(DB::raw("DATE_FORMAT(tanggal_dibayar, '%d-%m-%Y')"))
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
    }
})->middleware('admin');

Route::get('/dashboard/laporan/cetak_pdf', function () {
    $html = view('cetak_laporan.laba_rugi', [
        "pendapatan" => Invoice::select(
            "id",
            DB::raw("(sum(grand_total)) as total_pendapatan"),
            DB::raw("(DATE_FORMAT(tanggal_dibayar, '%d-%m-%Y')) as per_bulan")
        )
            ->orderBy('tanggal_dibayar')
            ->where('status', 'sudah dibayar')->orWhere('status', 'diambil')
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_dibayar, '%d-%m-%Y')"))
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

    // instantiate and use the dompdf class
    $options = new Options();
    $options->set('defaultFont', 'Times New Roman');
    $dompdf = new Dompdf($options);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
});

Route::get('/dashboard/cetak_laporan/laporan_transaksi', [InvoiceController::class, 'cetak_laporan']);

Route::get('/dashboard/cetak_laporan/laporan_transaksi/transaksi_pdf', [InvoiceController::class, 'cetak_pdf']);

Route::get('/dashboard/cetak_laporan/laporan_jenis_pengeluaran', [JenisPengeluaranController::class, 'cetak_laporan']);

Route::get('/dashboard/cetak_laporan/laporan_jenis_pengeluaran/jenis_pengeluaran_pdf', [ProdukController::class, 'cetak_pdf']);

Route::get('/dashboard/cetak_laporan/laporan_produk', [ProdukController::class, 'cetak_laporan']);
Route::get('/dashboard/cetak_laporan/produk/cetak_pdf', [ProdukController::class, 'cetak_pdf']);



Route::post('/dashboard/cart', [CartController::class, 'tambah']);
Route::get('/dashboard/cart/show', [CartController::class, 'show']);
Route::get('/dashboard/cart/hapus/{id}', [CartController::class, 'delete']);
Route::post('/dashboard/cart/transaksi', [CartController::class, 'transaksi']);

Route::get('/dashboard/invoice/detail/{id}', function ($id) {
    return view('transaksi.invoice_detail', [
        "data" => Transaksi::where('invoice_id', $id)->get(),
        "data_pg" => Invoice::where('id', $id)->first()
    ]);
});

Route::get('/dashboard/invoice/print/{id}', [InvoiceController::class, 'print']);


Route::resource('/dashboard/user', UserController::class)->middleware('admin');
Route::resource('/dashboard/master/pelanggan', PelangganController::class)->middleware('auth');
Route::resource('/dashboard/master/jenis_pengeluaran', JenisPengeluaranController::class);
Route::resource('/dashboard/master/produk', ProdukController::class);
Route::resource('/dashboard/invoice', InvoiceController::class)->middleware('auth');
