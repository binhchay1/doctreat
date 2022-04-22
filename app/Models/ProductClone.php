<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductClone extends Model
{
    use HasFactory;

    protected $table = 'products_clone';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'price',
        'image',
        'description',
        'type'
    ];
}
