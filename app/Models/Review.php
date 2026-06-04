<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    protected $fillable = [
        'booking_id',
        'client_id',
        'coiffeur_profile_id',
        'rating',
        'comment',
        'is_visible',
    ];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
            'rating'     => 'integer',
        ];
    }

    // ── Auto update coiffeur rating ───────────────
    protected static function booted(): void
    {
        static::saved(function ($review) {
            $review->coiffeurProfile->updateRating();
        });

        static::deleted(function ($review) {
            $review->coiffeurProfile->updateRating();
        });
    }

    // ── Relations ────────────────────────────────
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function coiffeurProfile()
    {
        return $this->belongsTo(CoiffeurProfile::class);
    }

    // ── Scopes ───────────────────────────────────
    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    // ── Accessors ────────────────────────────────
    public function getStarsAttribute(): string
    {
        return str_repeat('★', $this->rating)
            . str_repeat('☆', 5 - $this->rating);
    }
}
