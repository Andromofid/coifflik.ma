<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Booking extends Model
{
    protected $fillable = [
        'reference',
        'client_id',
        'coiffeur_profile_id',
        'service_id',
        'booking_date',
        'booking_time',
        'address',
        'city',
        'notes',
        'status',
        'cancel_reason',
        'total_price',
        'commission_amount',
        'payment_status',
    ];

    protected function casts(): array
    {
        return [
            'booking_date'      => 'date',
            'total_price'       => 'decimal:2',
            'commission_amount' => 'decimal:2',
        ];
    }

    // ── Auto reference ────────────────────────────
    protected static function booted(): void
    {
        static::creating(function ($booking) {
            $count = static::whereDate('created_at', today())->count() + 1;
            $booking->reference = 'BOOK-'
                . now()->format('Ymd') . '-'
                . str_pad($count, 3, '0', STR_PAD_LEFT);
        });
    }

    // ── Relations ────────────────────────────────
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function coiffeurProfile()
    {
        return $this->belongsTo(CoiffeurProfile::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    // ── Scopes ───────────────────────────────────
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed(Builder $query): Builder
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->whereIn('status', ['pending', 'confirmed'])
            ->where('booking_date', '>=', today())
            ->orderBy('booking_date')
            ->orderBy('booking_time');
    }

    // ── Helpers ──────────────────────────────────
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }
    public function hasReview(): bool
    {
        return $this->review()->exists();
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'En attente',
            'confirmed' => 'Confirmé',
            'completed' => 'Terminé',
            'cancelled' => 'Annulé',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'text-orange-600 bg-orange-50',
            'confirmed' => 'text-green-700 bg-green-50',
            'completed' => 'text-blue-700 bg-blue-50',
            'cancelled' => 'text-red-700 bg-red-50',
        };
    }
}
