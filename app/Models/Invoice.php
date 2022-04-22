<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    public $timestamps = true;

    protected $fillable = [
        'payment_code',
        'order_id'
    ];
}
