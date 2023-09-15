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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->char('id_barang');
            $table->foreignId('id_cabang')->constrained('cabangs')->onDelete('cascade')->onUpdate('cascade');
            $table->char('stok_awal', 255)->nullable();
            $table->char('stok_akhir', 255)->nullable();
            $table->date('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
