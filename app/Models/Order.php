<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primarykey = 'id';
    protected $guarded = [];
    public $timestamps = true;


    public function penitips(): BelongsTo
    {
        return $this->belongsTo(sellers::class, 'id_penitip');
    }
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'id_barang');
    }
    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'id_cabang');
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}

