<?php

namespace App\Models;

use App\Models\Products;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFormatRupiah;
    protected $table = 'carts';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function prdk(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'id_barang');
    }
}
