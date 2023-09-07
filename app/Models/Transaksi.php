<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'transaksis';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public $incrementing = false;
    public $timestamps = true;
    public function orderss(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
