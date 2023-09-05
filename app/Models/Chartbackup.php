<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'chart';
    protected $primarykey = 'id';
    protected $guarded = [];
}
