<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'status_payment',
        'payment_code',
        'order_id',
        'name_customer',
        'phone_customer',
        'order_date',
        'cost',
        'address_customer'
    ];

    public $timestamps = true;
}
