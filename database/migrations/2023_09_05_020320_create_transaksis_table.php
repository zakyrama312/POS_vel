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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_order')->constrained('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->char('invoice')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('potongan')->nullable();
            $table->integer('bayar')->nullable();
            $table->integer('kembalian')->nullable();
            $table->char('periode')->nullable();
            $table->char('bulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
