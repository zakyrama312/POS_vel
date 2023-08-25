<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabangs';
    protected $primarykey = 'id';

    // public $incrementing = false;
    public $timestamps = true;
}
