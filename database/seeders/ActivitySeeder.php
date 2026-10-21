<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        Activity::create([
            'title' => 'Membaca Bersama Kakak Relawan',
            'category' => 'Literasi',
            'description' => 'Kegiatan membaca dan belajar bersama anak-anak TBM Bintang Raharja.',
            'date' => '2026-09-13',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'instructor' => 'Kak Rina',
            'location' => 'TBM Bintang Raharja',
            'is_active' => true,
        ]);

        Activity::create([
            'title' => 'Kelas Kreativitas Anak',
            'category' => 'Kreativitas',
            'description' => 'Kegiatan menggambar, membuat kerajinan, dan mengembangkan kreativitas anak.',
            'date' => '2026-09-13',
            'start_time' => '10:00',
            'end_time' => '11:00',
            'instructor' => 'Kak Siti',
            'location' => 'TBM Bintang Raharja',
            'is_active' => true,
        ]);

        Activity::create([
            'title' => 'Belajar Komputer Dasar',
            'category' => 'Teknologi',
            'description' => 'Pengenalan dasar komputer dan teknologi untuk peserta TBM.',
            'date' => '2026-09-20',
            'start_time' => '09:00',
            'end_time' => '10:00',
            'instructor' => 'Kak Dimas',
            'location' => 'TBM Bintang Raharja',
            'is_active' => true,
        ]);
    }
}