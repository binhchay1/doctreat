<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    public $timestamps = true;
    
    protected $fillable = [
        'doctor_id',
        'customer_id',
        'date',
        'hours',
        'note'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'customer_id');
    }
}
