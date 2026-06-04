<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CoiffeurProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'bio',
        'city',
        'zones',
        'years_experience',
        'rating_avg',
        'total_reviews',
        'portfolio_images',
        'is_verified',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'zones'            => 'array',
            'portfolio_images' => 'array',
            'is_verified'      => 'boolean',
            'is_active'        => 'boolean',
            'rating_avg'       => 'decimal:2',
        ];
    }

    // ── Auto slug from user name + city ──────────
    protected static function booted(): void
    {
        static::creating(function ($profile) {
            if (empty($profile->slug)) {
                $profile->slug = static::generateSlug(
                    $profile->user->name . ' ' . $profile->city
                );
            }
        });
    }

    private static function generateSlug(string $value): string
    {
        $slug = str($value)->slug()->toString();
        $count = static::where('slug', 'like', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    // ── Relations ────────────────────────────────
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function activeServices()
    {
        return $this->hasMany(Service::class)
            ->where('is_active', true)
            ->orderBy('price');
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class)
            ->orderBy('day_of_week');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function visibleReviews()
    {
        return $this->hasMany(Review::class)
            ->where('is_visible', true)
            ->latest();
    }

    // ── Scopes ───────────────────────────────────
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('is_verified', true);
    }

    public function scopeInCity(Builder $query, string $city): Builder
    {
        return $query->where('city', $city);
    }

    public function scopeTopRated(Builder $query): Builder
    {
        return $query->orderByDesc('rating_avg')
            ->orderByDesc('total_reviews');
    }

    // ── Helpers ──────────────────────────────────
    public function getMinPriceAttribute(): float
    {
        return $this->services->min('price') ?? 0;
    }

    public function updateRating(): void
    {
        $avg   = $this->reviews()->where('is_visible', true)->avg('rating') ?? 0;
        $count = $this->reviews()->where('is_visible', true)->count();

        $this->update([
            'rating_avg'    => round($avg, 2),
            'total_reviews' => $count,
        ]);
    }
}
