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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->foreignId('id_penitip')->constrained('penitips')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kategori')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_cabang')->constrained('cabangs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
