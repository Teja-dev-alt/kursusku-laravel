<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'fee',
        'quota',
        'start_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'fee' => 'integer',
        'quota' => 'integer',
    ];
}