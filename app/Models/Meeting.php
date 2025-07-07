<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email', 
        'user_phone',
        'lawyer_name',
        'service_type',
        'payment_amount',
        'payment_method',
        'case_date',
        'meeting_datetime',
        'meeting_status',
        'case_description'
    ];

    protected $casts = [
        'case_date' => 'date',
        'meeting_datetime' => 'datetime',
        'payment_amount' => 'decimal:2'
    ];
} 