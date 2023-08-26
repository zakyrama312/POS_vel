<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stocks extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public $incrementing = false;
    public $timestamps = true;

    public function stocks(): HasMany
    {
        return $this->hasMany(Products::class);
    }
}
