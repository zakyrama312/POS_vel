<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sellers extends Model
{
    use HasFactory;

    protected $table = 'penitips';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public $incrementing = false;
    public $timestamps = true;
    public function produk(): HasMany
    {
        return $this->hasMany(Products::class);
    }
}
