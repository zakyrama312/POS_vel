<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $primarykey = 'id';
    protected $guarded = [];
    // public function kelass(): HasMany
    // {
    //     return $this->hasMany(Siswa::class);
    // }
}
