<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\CoiffeurProfile;
use App\Models\Service;
use Illuminate\Http\Request;

class CoiffeurController extends Controller
{
    // ── LISTING ──────────────────────────────────────
    public function index(Request $request)
    {
        $query = CoiffeurProfile::query()
            ->with(['user', 'services', 'reviews'])
            ->where('is_active', true)
            ->where('is_verified', true);

        // Filters
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        if ($request->filled('service')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->where('category', $request->service)
                    ->where('is_active', true);
            });
        }

        if ($request->filled('price_max')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->where('price', '<=', $request->price_max);
            });
        }

        if ($request->filled('rating_min')) {
            $query->where('rating_avg', '>=', $request->rating_min);
        }

        if ($request->filled('verified')) {
            $query->where('is_verified', true);
        }

        // Sort
        match ($request->sort ?? 'recommended') {
            'rating'    => $query->orderByDesc('rating_avg'),
            'price_asc' => $query->orderBy(
                Service::select('price')
                    ->whereColumn('coiffeur_profile_id', 'coiffeur_profiles.id')
                    ->orderBy('price')
                    ->limit(1)
            ),
            default     => $query->orderByDesc('rating_avg')
                ->orderByDesc('total_reviews'),
        };

        $coiffeures = $query->paginate(12)->withQueryString();

        $cities = CoiffeurProfile::where('is_active', true)
            ->distinct()->pluck('city');

        $categories = Service::distinct()->pluck('category');

        return view('market.coiffeuse.index', compact(
            'coiffeures',
            'cities',
            'categories'
        ));
    }

    // ── BY CITY ───────────────────────────────────────
    public function byCity(string $city, Request $request)
    {
        $request->merge(['city' => $city]);
        return $this->index($request);
    }

    // ── DETAIL ────────────────────────────────────────
    public function show(string $city, string $slug)
    {
        $coiffeuse = CoiffeurProfile::query()
            ->with([
                'user',
                'services'       => fn($q) => $q->where('is_active', true),
                'availabilities' => fn($q) => $q->where('is_active', true)->orderBy('day_of_week'),
                'reviews'        => fn($q) => $q->where('is_visible', true)
                    ->with('client')
                    ->latest()
                    ->limit(10),
            ])
            ->where('city', $city)
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Next 7 available days based on availabilities
        $availableDays = $this->getNextAvailableDays($coiffeuse);

        // Related coiffeures same city
        $related = CoiffeurProfile::query()
            ->with(['user', 'services'])
            ->where('city', $city)
            ->where('id', '!=', $coiffeuse->id)
            ->where('is_active', true)
            ->orderByDesc('rating_avg')
            ->limit(4)
            ->get();

        return view('market.coiffeuse.show', compact(
            'coiffeuse',
            'availableDays',
            'related'
        ));
    }

    // ── HELPERS ───────────────────────────────────────
    private function getNextAvailableDays(CoiffeurProfile $coiffeuse): array
    {
        $availableDayNumbers = $coiffeuse->availabilities
            ->pluck('day_of_week')
            ->toArray();

        $days = [];
        $date = now();

        for ($i = 0; $i < 14 && count($days) < 7; $i++) {
            $date = now()->addDays($i);
            if (in_array($date->dayOfWeek, $availableDayNumbers)) {
                $days[] = [
                    'date'       => $date->format('Y-m-d'),
                    'day_name'   => $date->locale('fr')->isoFormat('ddd'),
                    'day_number' => $date->format('d'),
                    'month'      => $date->locale('fr')->isoFormat('MMM'),
                    'is_today'   => $date->isToday(),
                ];
            }
        }

        return $days;
    }
}
