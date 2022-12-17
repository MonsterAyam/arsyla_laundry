<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User_role;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\JenisPengeluaran;
use App\Models\Invoice;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        User_role::create([
            "role_name" => "Administrator"
        ]);
        User_role::create([
            "role_name" => "Cashier"
        ]);

        User::create([
            "role_id" => 1,
            "username" => "wakOkto12",
            "name" => "Okky Octora Firdana",
            "email" => "wak001@gmail.com",
            "address" => "Kebun Kopi",
            "password" => Hash::make('12345')
        ]);
        // User::create([
        //     "role_id" => 0,
        //     "username" => "Fazlu06",
        //     "name" => "Fazlu Rachman",
        //     "email" => "fazrlu9575@gmail.com",
        //     "address" => "Kenali Asam Bawah",
        //     "password" => Hash::make('12345')
        // ]);

        // Pelanggan::create([
        //     "nama_pelanggan" => 'Alep Teroris',
        //     "address" => "Mayang",
        //     "no_telp" => "0838927521"
        // ]);
        // Pelanggan::create([
        //     "nama_pelanggan" => 'Zaenal',
        //     "address" => "NusaIndah",
        //     "no_telp" => "0838927521"
        // ]);

        // Produk::create([
        //     "jenis_produk" => "SATUAN",
        //     "kode" => "B B Standar",
        //     "nama" => "Boneka Besar Standar",
        //     "harga_jual" => 45000
        // ]);
        // Produk::create([
        //     "jenis_produk" => "SATUAN",
        //     "kode" => "B B Express",
        //     "nama" => "Boneka Besar Express",
        //     "harga_jual" => 50000
        // ]);

        // $tujuhHari = mktime(0,0,0, date('n'),date('j')+7, date('Y'));

        // Transaksi::create([
        //     "invoice_id" => 1,
        //     "produk_id" => 1,
        //     "pelanggan_id" => 1,
        //     "qty" => 4,
        //     "total_akhir" => 200000
        // ]);
        // Transaksi::create([
        //     "invoice_id" => 1,
        //     "produk_id" => 2,
        //     "pelanggan_id" => 1,
        //     "qty" => 5,
        //     "total_akhir" => 300000
        // ]);

        // Invoice::create([
        //     "pelanggan_id" => 1,
        //     "batas_waktu" => date('Y-m-d H:i:s', $tujuhHari),
        //     "grand_total" => 500000
        // ]);
        // Invoice::create([
        //     "pelanggan_id" => 2,
        //     "batas_waktu" => date('Y-m-d H:i:s', $tujuhHari),
        //     "grand_total" => 400000
        // ]);
        // Invoice::create([
        //     "pelanggan_id" => 2,
        //     "batas_waktu" => date('Y-m-d H:i:s', $tujuhHari),
        //     "grand_total" => 300000
        // ]);

      

        // JenisPengeluaran::create([
        //     "nama_jenis_pengeluaran" => "Gaji Pegawai",
        //     "total_harga" => 10000000,
        //     "keterangan" => "Tiap Bulan"
        // ]);
    }
}
