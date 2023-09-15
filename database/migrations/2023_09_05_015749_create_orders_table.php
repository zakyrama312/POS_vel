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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_penitip')->constrained('penitips')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_cabang')->constrained('cabangs')->onDelete('cascade')->onUpdate('cascade');
            $table->char('invoice')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            $table->integer('laba');
            $table->integer('uang_kembali');
            $table->char('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
