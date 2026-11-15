<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // Satu kursus dapat memiliki banyak pendaftaran.
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    // Satu kursus dapat diikuti banyak peserta.
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
            ->withPivot('status')
            ->withTimestamps();
    }
}