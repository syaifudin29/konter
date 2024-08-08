<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id');
            $table->text('nama_produk');
            $table->text('beli');
            $table->text('jual');
            $table->text('deskripsi')->nullable();
            $table->integer('payment_id');
            $table->enum('keterangan',['masuk','keluar']);
            $table->enum('lunas',['1','0']);
            $table->enum('aktif', ['1','0']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
