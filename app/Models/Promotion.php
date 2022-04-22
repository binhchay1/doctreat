<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotion';

    public $timestamps = true;
    
    protected $fillable = [
        'promotion_code',
        'start_date',
        'expire_date',
        'status',
        'type',
        'percent'
    ];
}
