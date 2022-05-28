<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelSchedule extends Model
{
    use HasFactory;

    protected $table = 'cancel_schedule';

    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'date',
        'hours',
        'reason'
    ];
}
