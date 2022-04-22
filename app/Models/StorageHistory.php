<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageHistory extends Model
{
    use HasFactory;

    protected $table = 'storage_history';

    public $timestamps = true;

    protected $fillable = [
        'last_quantity',
        'add_quantity',
        'product_id',
        'invoice',
        'note',
        'employee',
        'status',
        'employee_id',
        'type'
    ];

    public function productClone() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
