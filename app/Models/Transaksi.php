<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['Pelanggan', 'Produk', 'Invoice'];


    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function Invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
