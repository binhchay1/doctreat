<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_line';

    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product', 'id', 'product_id');
    }
}
