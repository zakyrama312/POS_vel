<?php

namespace App\Models;

use App\Models\Cart;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public $incrementing = false;
    public $timestamps = true;



    public function penitips(): BelongsTo
    {
        return $this->belongsTo(sellers::class, 'id_penitip');
    }

    public function keranjang(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    
}
