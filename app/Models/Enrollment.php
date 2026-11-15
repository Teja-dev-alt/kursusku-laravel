<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = [
        'participant_id',
        'course_id',
        'status',
    ];

    // Pendaftaran ini dimiliki oleh satu peserta.
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    // Pendaftaran ini terhubung dengan satu kursus.
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}