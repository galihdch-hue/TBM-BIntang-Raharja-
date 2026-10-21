<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $participant = Auth::user();


        $stats = [
            [
                'icon' => '📅',
                'label' => 'Kegiatan Diikuti',
                'value' => '12',
            ],
            [
                'icon' => '✅',
                'label' => 'Kehadiran',
                'value' => '92%',
            ],
            [
                'icon' => '📚',
                'label' => 'Materi Selesai',
                'value' => '18',
            ],
            [
                'icon' => '🏆',
                'label' => 'Total Poin',
                'value' => '850',
            ],
        ];


        $upcomingActivities = [
            [
                'title' => 'Membaca Bersama Kakak Relawan',
                'category' => 'Literasi',
                'date' => '13 September 2026',
                'time' => '09.00 - 10.00',
                'location' => 'TBM Bintang Raharja',
            ],
            [
                'title' => 'Kelas Kreativitas Anak',
                'category' => 'Kreativitas',
                'date' => '13 September 2026',
                'time' => '10.00 - 11.00',
                'location' => 'TBM Bintang Raharja',
            ],
            [
                'title' => 'Belajar Komputer Dasar',
                'category' => 'Teknologi',
                'date' => '20 September 2026',
                'time' => '09.00 - 10.00',
                'location' => 'TBM Bintang Raharja',
            ],
        ];


        $materials = [
            [
                'title' => 'Mengenal Dasar-Dasar Komputer',
                'type' => 'Materi',
                'date' => '10 September 2026',
                'status' => 'Belum dibaca',
            ],
            [
                'title' => 'Latihan Membaca Cerita Pendek',
                'type' => 'Tugas',
                'date' => '8 September 2026',
                'status' => 'Belum dikerjakan',
            ],
            [
                'title' => 'Kreativitas dan Kerajinan Tangan',
                'type' => 'Materi',
                'date' => '5 September 2026',
                'status' => 'Selesai',
            ],
        ];


        $progress = [
            [
                'title' => 'Literasi',
                'percentage' => 85,
            ],
            [
                'title' => 'Teknologi',
                'percentage' => 70,
            ],
            [
                'title' => 'Kreativitas',
                'percentage' => 90,
            ],
        ];


        $achievements = [
            [
                'icon' => '📚',
                'title' => 'Rajin Membaca',
                'description' => 'Menyelesaikan 10 materi bacaan.',
            ],
            [
                'icon' => '⭐',
                'title' => 'Peserta Aktif',
                'description' => 'Aktif mengikuti kegiatan TBM.',
            ],
            [
                'icon' => '🏆',
                'title' => '100 Poin',
                'description' => 'Berhasil mengumpulkan 100 poin.',
            ],
        ];


        return view('peserta.dashboard', compact(
            'participant',
            'stats',
            'upcomingActivities',
            'materials',
            'progress',
            'achievements'
        ));
    }
}