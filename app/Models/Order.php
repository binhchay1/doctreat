<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = [
        'name_customer',
        'phone_customer',
        'address_customer',
        'zip_code',
        'order_date',
        'status'
    ];

    public function orderLine()
    {
        return $this->hasMany('App\Models\OrderLine', 'order_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'order_id', 'id');
    }
}
