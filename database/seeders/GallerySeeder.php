<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Kegiatan Membaca Bersama',
            'category' => 'Literasi',
            'description' => 'Kegiatan membaca dan belajar bersama di TBM Bintang Raharja.',
            'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-09-01',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Belajar Bersama Anak-anak',
            'category' => 'Pembelajaran',
            'description' => 'Kegiatan belajar bersama dengan suasana yang menyenangkan.',
            'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-08-25',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Kelas Kreativitas Anak',
            'category' => 'Kreativitas',
            'description' => 'Kegiatan kreativitas untuk mengembangkan ide dan kemampuan anak.',
            'image' => 'https://images.unsplash.com/photo-1560785496-3c9d27877182?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-08-18',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Belajar Komputer Dasar',
            'category' => 'Teknologi',
            'description' => 'Pengenalan komputer dan teknologi dasar bagi peserta TBM.',
            'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-08-10',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Kegiatan Bersama Relawan',
            'category' => 'Kegiatan',
            'description' => 'Kebersamaan peserta dan relawan dalam kegiatan TBM Bintang Raharja.',
            'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-08-05',
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Rumah Pendidikan dan Keterampilan',
            'category' => 'Program',
            'description' => 'Dokumentasi kegiatan pendidikan dan keterampilan di TBM Bintang Raharja.',
            'image' => 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?auto=format&fit=crop&w=1200&q=80',
            'date' => '2026-07-28',
            'is_active' => true,
        ]);
    }
}