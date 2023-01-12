<?php

namespace App\Http\Controllers;

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
        if ($request->get('search')) {
            $searchTerm = $request->get('search');
            $data = Invoice::query()->latest()
                ->where(function ($query) use ($searchTerm) {
                    if ($searchTerm) {
                        $query->where('tanggal_dibayar', 'like', '%' . $searchTerm . '%')
                            ->orWhere('grand_total', 'like', '%' . $searchTerm . '%');
                    }
                })
                ->paginate(10);
            return view('transaksi.index', [
                "title" => "data pelanggan",
                "data" => $data
            ]);
        } else {
            return view('transaksi.index', [
                "data" => Invoice::query()->latest()->paginate(10)
            ]);
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
}
