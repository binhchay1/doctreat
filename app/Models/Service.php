<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'price',
        'doctor_id',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'doctor_id');
    }
}
