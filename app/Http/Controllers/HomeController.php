<?php

namespace App\Http\Controllers;

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

        $activities = [
            [
                'title' => 'Belajar Bersama Kakak Relawan',
                'date' => 'Minggu, 13 September 2026',
                'time' => '09.00 - 10.00',
                'category' => 'Literasi',
            ],
            [
                'title' => 'Kelas Kreativitas Anak',
                'date' => 'Minggu, 13 September 2026',
                'time' => '10.00 - 11.00',
                'category' => 'Kreativitas',
            ],
            [
                'title' => 'Belajar Komputer Dasar',
                'date' => 'Minggu, 20 September 2026',
                'time' => '09.00 - 10.00',
                'category' => 'Teknologi',
            ],
        ];

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