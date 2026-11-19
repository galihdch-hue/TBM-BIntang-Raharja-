<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::firstOrCreate([
            'slug' => 'tbm-bintang-raharja-terus-mengembangkan-kegiatan-literasi',
        ], [
            'title' => 'TBM Bintang Raharja Terus Mengembangkan Kegiatan Literasi',
            'category' => 'Literasi',
            'excerpt' => 'Berbagai kegiatan literasi terus dikembangkan sebagai ruang belajar dan membaca bagi masyarakat.',
            'content' => 'TBM Bintang Raharja terus mengembangkan berbagai kegiatan literasi dan pembelajaran bagi anak-anak serta masyarakat sekitar. Kegiatan dilakukan melalui aktivitas membaca, belajar bersama, dan berbagai program pengembangan keterampilan.',
            'author' => 'TBM Bintang Raharja',
            'published_at' => '2026-09-01',
            'is_published' => true,
        ]);

        News::firstOrCreate([
            'slug' => 'kegiatan-belajar-bersama-di-tbm-bintang-raharja',
        ], [
            'title' => 'Kegiatan Belajar Bersama di TBM Bintang Raharja',
            'category' => 'Kegiatan',
            'excerpt' => 'Kegiatan belajar bersama menjadi salah satu aktivitas yang dilakukan untuk menciptakan suasana belajar yang menyenangkan.',
            'content' => 'Kegiatan belajar bersama menjadi bagian dari aktivitas TBM Bintang Raharja. Peserta dapat belajar, membaca, berdiskusi, dan mengembangkan kemampuan bersama dalam suasana yang menyenangkan.',
            'author' => 'TBM Bintang Raharja',
            'published_at' => '2026-08-20',
            'is_published' => true,
        ]);

        News::firstOrCreate([
            'slug' => 'kolaborasi-untuk-mendukung-gerakan-literasi',
        ], [
            'title' => 'Kolaborasi untuk Mendukung Gerakan Literasi',
            'category' => 'Kolaborasi',
            'excerpt' => 'Kolaborasi dengan berbagai pihak menjadi bagian dari upaya TBM Bintang Raharja dalam mengembangkan kegiatan pendidikan dan literasi.',
            'content' => 'TBM Bintang Raharja terus membuka ruang kolaborasi dengan berbagai pihak untuk mendukung kegiatan pendidikan, literasi, dan pengembangan keterampilan masyarakat.',
            'author' => 'TBM Bintang Raharja',
            'published_at' => '2026-08-10',
            'is_published' => true,
        ]);
    }
}
