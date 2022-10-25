<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'payment_id',
        'payer_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
    ];

}
