<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Service extends Model
{
    protected $fillable = [
        'coiffeur_profile_id',
        'name',
        'category',
        'description',
        'price',
        'duration_min',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'price'     => 'decimal:2',
        ];
    }

    // ── Relations ────────────────────────────────
    public function coiffeurProfile()
    {
        return $this->belongsTo(CoiffeurProfile::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // ── Scopes ───────────────────────────────────
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    // ── Accessors ────────────────────────────────
    public function getDurationLabelAttribute(): string
    {
        $h = intdiv($this->duration_min, 60);
        $m = $this->duration_min % 60;

        if ($h > 0 && $m > 0) return "{$h}h{$m}min";
        if ($h > 0)           return "{$h}h";
        return "{$m}min";
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'coupe'      => 'Coupe',
            'coloration' => 'Coloration',
            'soin'       => 'Soin',
            'coiffage'   => 'Coiffage',
            'lissage'    => 'Lissage',
            default      => 'Autre',
        };
    }
}
