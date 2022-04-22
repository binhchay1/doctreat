<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDoctor extends Model
{
    use HasFactory;

    protected $table = 'invoice_doctor';

    public $timestamps = true;

    protected $fillable = [
        'invoice_code',
        'services',
        'total',
        'doctor_id'
    ];
}
