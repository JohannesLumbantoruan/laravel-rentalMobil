<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('transaksi_id');
            $table->integer('transaksi_karyawan');
            $table->integer('transaksi_kostumer');
            $table->integer('transaksi_mobil');
            $table->date('transaksi_tgl_pinjam');
            $table->date('transaksi_tgl_kembali');
            $table->integer('transaksi_harga');
            $table->integer('transaksi_denda');
            $table->date('transaksi_tgl');
            $table->integer('transaksi_totaldenda')->nullable();
            $table->integer('transaksi_status');
            $table->date('transaksi_tgldikembalikan')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
