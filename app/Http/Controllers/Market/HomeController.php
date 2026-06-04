<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\CoiffeurProfile;

class HomeController extends Controller
{
    public function index()
    {
        $featured = CoiffeurProfile::query()
            ->with(['user', 'services', 'reviews'])
            ->where('is_active', true)
            ->where('is_verified', true)
            ->orderByDesc('rating_avg')
            ->limit(8)
            ->get();

        $cities = CoiffeurProfile::query()
            ->where('is_active', true)
            ->distinct()
            ->pluck('city');

        $stats = [
            'coiffeures' => CoiffeurProfile::where('is_active', true)->count(),
            'bookings'   => \App\Models\Booking::where('status', 'completed')->count(),
            'cities'     => $cities->count(),
        ];

        return view('market.pages.home', compact('featured', 'cities', 'stats'));
    }
}
