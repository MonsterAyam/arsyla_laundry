<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->dateTime('batas_waktu')->nullable();
            $table->enum('status', ['belum dibayar', 'salah input', 'sudah dibayar', 'diambil'])->default('belum dibayar');
            $table->dateTime('tanggal_dibayar')->nullable();
            $table->integer('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
