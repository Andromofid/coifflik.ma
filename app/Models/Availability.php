<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'coiffeur_profile_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // ── Relations ────────────────────────────────
    public function coiffeurProfile()
    {
        return $this->belongsTo(CoiffeurProfile::class);
    }

    // ── Accessors ────────────────────────────────
    public function getDayNameAttribute(): string
    {
        return match ($this->day_of_week) {
            0 => 'Dimanche',
            1 => 'Lundi',
            2 => 'Mardi',
            3 => 'Mercredi',
            4 => 'Jeudi',
            5 => 'Vendredi',
            6 => 'Samedi',
        };
    }

    public function getDayShortAttribute(): string
    {
        return match ($this->day_of_week) {
            0 => 'Dim',
            1 => 'Lun',
            2 => 'Mar',
            3 => 'Mer',
            4 => 'Jeu',
            5 => 'Ven',
            6 => 'Sam',
        };
    }
}
