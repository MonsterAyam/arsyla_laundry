<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
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
            $data = Produk::query()
                ->where(function ($query) use ($searchTerm) {
                    if ($searchTerm) {
                        $query->where('jenis_produk', 'like', '%' . $searchTerm . '%')
                            ->orWhere('kode', 'like', '%' . $searchTerm . '%')
                            ->orWhere('nama', 'like', '%' . $searchTerm . '%')
                            ->orWhere('harga_jual', 'like', '%' . $searchTerm . '%')->get();
                    }
                })
                ->paginate(10);
            return view('produk.index', [
                "data" => $data
            ]);
        } else {
            return view('produk.index', [
                "data" => Produk::paginate(10)
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
            "kode" => "required|max:20|unique:produks",
            "nama" => "required|max:50|unique:produks",
            "jenis_produk" => "required",
            "harga_jual" => "required|numeric"
        ]);

        Produk::create($validateData);

        return back()->with('success', 'Produk Baru Berhasil Ditambahkan!');
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
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            "data" => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Produk $produk, Request $request)
    {
        $validateData = $request->validate([
            "jenis_produk" => "required",
            "kode" => "required",
            "nama" => "required",
            "harga_jual" => "required|numeric"
        ]);

        Produk::where('id', $produk->id)
            ->update($validateData);
        return redirect('/dashboard/master/produk')->with('success', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);

        return back()->with('success', 'Data Produk Berhasil Dihapus!');
    }
}
