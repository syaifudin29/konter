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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama', length: 100);
            $table->string('label_id');
            $table->enum('status', ['aktif', 'gangguan']);
            $table->integer('beli');
            $table->integer('jual');
            $table->text('keterangan')->nullable();
            $table->enum('aktif', ['1','0']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
