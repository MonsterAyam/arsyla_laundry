<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('pelanggan')) {
            $result = DB::table('invoices')
                ->join('pelanggans', 'invoices.pelanggan_id', '=', 'pelanggans.id')
                ->select('invoices.*', 'pelanggans.nama_pelanggan')
                ->where('pelanggans.nama_pelanggan', '=', $request->get('pelanggan'))
                ->whereBetween('invoices.created_at', [$request->get('date-dari'), $request->get('date-sampai')])
                ->paginate(10); // Menggunakan metode paginate() untuk menghasilkan objek kelas LengthAwarePaginator
            return view('transaksi.index', [
                "title" => "data pelanggan",
                "data" => $result // Mengembalikan hasil dalam bentuk koleksi (collection)
            ]);
        } else {
            return view('transaksi.index', [
                "data" => DB::table('invoices')
                    ->join('pelanggans', 'invoices.pelanggan_id', '=', 'pelanggans.id')
                    ->select('invoices.*', 'pelanggans.nama_pelanggan')
                    ->latest()
                    ->paginate(10)
            ]);
            $validateData['no_telp'] = $request->post('no_telp');
            $validateData['batas_pembayaran'] = date('Y-m-d H:i:s', time() + (60 * 30));
            $expired = mktime(0, 0, 0, date('n'), date('j') + 1, date('Y'));
            $validateData['expired'] = date('Y-m-d', $expired);
            // $validateData['batas_pembayaran'] = date('M d, Y H:i:s', time() + (60 * 3));
            $validateData['pelanggan'] = Auth()->user()->name;
            $transaksiID = transaksi::create($validateData)->id;
            $ubah = ["active" => 1];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create', [
            "pelanggan" => Pelanggan::all(),
            "produk" => Produk::all(),
        ]);

        session()->forget("cart");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('transaksi.edit', [
            "data" => $invoice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validateData = $request->validate([
            "status" => "required"
        ]);

        $validateData['tanggal_dibayar'] = $validateData['tanggal_dibayar'] = date('Y-m-d h:m:s');
        // $validateData['batas_waktu'] = null;

        Invoice::where('id', $invoice->id)
            ->update($validateData);

        return redirect('/dashboard/invoice')->with('success', 'Status Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        Invoice::destroy($invoice->id);

        return back()->with('success', 'Transaksi Berhasil Dihapus!');
    }

    public function print($id)
    {
        $html = view('cetak_laporan.pdf', [
            "data_pg" => Invoice::where('id', $id)->first(),
            "data" => Transaksi::where('invoice_id', $id)->get()
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
    }

    public function cetak_laporan(Request $request)
    {
        if ($request->get('tanggal_dari') && $request->get('tanggal_sampai')) {
            $data = Invoice::query()
                ->where('tanggal_dibayar', '>=', $request->get('tanggal_dari'))
                ->where('tanggal_dibayar', '<=', $request->get('tanggal_sampai'))
                ->latest()
                ->paginate(10);
            return view('laporan_transaksi.index', [
                "title" => "data pelanggan",
                "data" => $data
            ]);
        } else {
            return view('laporan_transaksi.index', [
                "data" => Invoice::query()->latest()->paginate(10)
            ]);
        }
    }

    public function cetak_pdf()
    {
        $html = view('cetak_laporan.transaksi', [
            "data" => Invoice::paginate(10)
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
    }
}
