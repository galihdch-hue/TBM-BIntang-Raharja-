<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $stats = [
            [
                'number' => '500+',
                'label' => 'Buku',
                'icon' => '📚',
            ],
            [
                'number' => '120+',
                'label' => 'Peserta',
                'icon' => '👥',
            ],
            [
                'number' => '50+',
                'label' => 'Kegiatan',
                'icon' => '📅',
            ],
            [
                'number' => '10+',
                'label' => 'Kolaborasi',
                'icon' => '🤝',
            ],
        ];

        $activities = Activity::where('is_active', true)
            ->orderBy('date', 'asc')
            ->get();

        $partners = [
            'President University',
            'Naresuan University',
            'Universiti Utara Malaysia',
            'Yayasan Bersatu Membangun Indonesia',
        ];

        return view('home', compact(
            'stats',
            'activities',
            'partners'
        ));
    }
}
