<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public $incrementing = false;
    public $timestamps = true;



    public function penitips(): BelongsTo
    {
        return $this->belongsTo(Penitip::class, 'id_penitip');
    }
    
}
