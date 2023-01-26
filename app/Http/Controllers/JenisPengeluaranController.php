<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPengeluaran;
use Dompdf\Dompdf;
use Dompdf\Options;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('tanggal_dari') && $request->get('tanggal_sampai')) {
            $data = JenisPengeluaran::query()
                ->where('tanggal_dibayar', '>=', $request->get('tanggal_dari'))
                ->where('tanggal_dibayar', '<=', $request->get('tanggal_sampai'))
                ->latest()
                ->paginate(10);
            return view('jenis_pengeluaran.index', [
                "data" => $data
            ]);
        } else {
            return view('jenis_pengeluaran.index', [
                "data" => JenisPengeluaran::query()->orderBy('nama_jenis_pengeluaran', 'asc')
                    ->paginate(10)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nama_jenis_pengeluaran" => "required",
            "total_harga" => "required|numeric",
            "keterangan" => "required"
        ]);

        jenisPengeluaran::create($validateData);

        return back()->with('success', 'Data Pengeluaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPengeluaran $jenisPengeluaran)
    {
        return view('jenis_pengeluaran.edit', [
            "data" => $jenisPengeluaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPengeluaran $jenisPengeluaran)
    {
        $validateData = $request->validate([
            "nama_jenis_pengeluaran" => "required|min:3|max:50",
            "total_harga" => "required",
            "keterangan"  => "required|max:50",
        ]);

        JenisPengeluaran::where('id', $jenisPengeluaran->id)
            ->update($validateData);

        return redirect('/dashboard/master/jenis_pengeluaran')->with('success', 'Data Pengeluaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPengeluaran $jenisPengeluaran)
    {
        JenisPengeluaran::destroy($jenisPengeluaran->id);

        return back()->with('success', 'Data Pengeluaran Berhasil Dihapus!');
    }

    public function cetak_laporan(Request $request)
    {
        if ($request->get('search')) {
            $searchTerm = $request->get('search');
            $data = JenisPengeluaran::query()
                ->where(function ($query) use ($searchTerm) {
                    if ($searchTerm) {
                        $query->where('nama_jenis_pengeluaran', 'like', '%' . $searchTerm . '%')
                            ->orWhere('total_harga', 'like', '%' . $searchTerm . '%')
                            ->orWhere('keterangan', 'like', '%' . $searchTerm . '%')->get();
                    }
                })
                ->paginate(10);
            return view('laporan_jenis_pengeluaran.index', [
                "data" => $data
            ]);
        } else {
            return view('laporan_jenis_pengeluaran.index', [
                "data" => JenisPengeluaran::query()->orderBy('nama_jenis_pengeluaran', 'asc')
                    ->paginate(10)
            ]);
        }
    }

    public function cetak_pdf()
    {
        $html = view('cetak_laporan.jenis_pengeluaran', [
            "data" => JenisPengeluaran::paginate(10)
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
