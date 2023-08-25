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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('id_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->char('stok_awal',255)->nullable();
            $table->char('stok_akhir',255)->nullable();
            $table->char('hpp',255)->nullable();
            $table->char('harga_jual',255)->nullable();
            $table->char('disc',255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
