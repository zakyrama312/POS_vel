<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penitip extends Model
{
    use HasFactory;
    protected $table = 'penitips';
    protected $primarykey = 'id';

    // public $incrementing = false;
    public $timestamps = true;
    public function produk(): HasMany
    {
        return $this->hasMany(Products::class);
    }
}
