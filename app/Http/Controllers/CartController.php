<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Invoice;

class CartController extends Controller
{
   function tambah(Request $request)
    {
        $validateData = $request->validate([
            "lang" => "required",
            "qty_produk" => "required"
        ]);

        $produk = Produk::where('id', $validateData['lang'])->first();

        $cart = session("cart");
        $cart[$produk->id] = [
            "kode_produk" => $produk->kode,
            "jenis_produk" => $produk->jenis_produk,
            "harga_produk" => $produk->harga_jual,
            "qty_produk" => $validateData['qty_produk']
        ];

        session(["cart" => $cart]);
        return redirect('/dashboard/cart/show');
    }

    function show()
    {
        $cart = session("cart");
        return view('transaksi.cart',[
            "pelanggan" => Pelanggan::all(),
            "produk" => Produk::all(),
        ])->with("cart", $cart);
    }

    function delete($id)
    {
        $cart = session("cart");
        unset($cart[$id]);
        session(["cart" => $cart]);
        return redirect("/dashboard/cart/show");
    }

    function transaksi(Request $request)
    {
        $cart = session("cart");
        $validateData = $request->validate([
            "batas_waktu" => "required",
            "status" => "required",
        ]);

        $grandTotal = 0;
        foreach($cart as $ct => $val){
            $subTotal = $val['qty_produk'] * $val['harga_produk'];
            $grandTotal += $subTotal;
        }

        if($validateData['status'] === 'sudah dibayar'){
            $validateData['tanggal_dibayar'] = date('Y-m-d h:m:s');
        }
        $validateData['pelanggan_id'] = $request->lang;
        $validateData['grand_total'] = $grandTotal;

        $invoiceId = Invoice::create($validateData)->id;
        
        foreach($cart as $ct => $val){
            $data = [
                "produk_id" => $ct,
                "pelanggan_id" => $request->lang,
                "invoice_id" => $invoiceId,
                "qty" => $val['qty_produk'],
                "total_akhir" => $val['qty_produk'] * $val['harga_produk']
            ];
            Transaksi::create($data);
        }
        session()->forget("cart");

        return redirect('/dashboard/invoice')->with('success','Transaksi Berhasil Ditambahkan');
        
    }
}
