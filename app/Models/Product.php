<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'price',
        'image',
        'description',
        'type'
    ];

    public function storage()
    {
        return $this->hasOne('App\Models\Storage', 'product_id', 'id');
    }

    public function storageHistory()
    {
        return $this->hasMany('App\Models\StorageHistory', 'product_id', 'id');
    }

    public function orderLine()
    {
        return $this->hasMany('App\Models\OrderLine', 'product_id', 'id');
    }
}
