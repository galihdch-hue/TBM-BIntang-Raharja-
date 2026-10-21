<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        Material::create([
            'title' => 'Mengenal Dasar-Dasar Komputer',
            'category' => 'Teknologi',
            'description' => 'Materi pengenalan dasar komputer untuk peserta TBM.',
            'content' => '
                <h3>Apa Itu Komputer?</h3>

                <p>
                    Komputer adalah perangkat elektronik yang dapat
                    digunakan untuk mengolah data menjadi informasi.
                </p>

                <h3>Bagian Dasar Komputer</h3>

                <p>
                    Beberapa bagian komputer yang umum digunakan
                    antara lain monitor, keyboard, mouse, dan CPU.
                </p>

                <h3>Manfaat Komputer</h3>

                <p>
                    Komputer dapat digunakan untuk belajar,
                    mengerjakan tugas, mencari informasi,
                    dan berbagai kegiatan lainnya.
                </p>
            ',
            'type' => 'materi',
            'is_published' => true,
        ]);


        Material::create([
            'title' => 'Membaca dan Memahami Cerita',
            'category' => 'Literasi',
            'description' => 'Materi untuk meningkatkan kemampuan membaca dan memahami isi cerita.',
            'content' => '
                <h3>Membaca dengan Baik</h3>

                <p>
                    Membaca merupakan kegiatan untuk memahami
                    informasi yang terdapat dalam sebuah tulisan.
                </p>

                <h3>Memahami Isi Cerita</h3>

                <p>
                    Setelah membaca sebuah cerita, kita dapat
                    mencari tokoh, tempat, waktu, dan pesan
                    yang terdapat dalam cerita.
                </p>

                <h3>Latihan</h3>

                <p>
                    Bacalah sebuah cerita pendek kemudian
                    ceritakan kembali menggunakan kata-kata sendiri.
                </p>
            ',
            'type' => 'materi',
            'is_published' => true,
        ]);


        Material::create([
            'title' => 'Kreativitas dan Kerajinan Tangan',
            'category' => 'Kreativitas',
            'description' => 'Materi kreativitas untuk mengembangkan ide melalui kegiatan kerajinan.',
            'content' => '
                <h3>Apa Itu Kreativitas?</h3>

                <p>
                    Kreativitas adalah kemampuan untuk menghasilkan
                    ide atau karya baru.
                </p>

                <h3>Mengembangkan Kreativitas</h3>

                <p>
                    Kreativitas dapat dikembangkan melalui kegiatan
                    menggambar, membuat kerajinan, menulis,
                    dan aktivitas lainnya.
                </p>
            ',
            'type' => 'materi',
            'is_published' => true,
        ]);


        Material::create([
            'title' => 'Internet Sehat dan Aman',
            'category' => 'Teknologi',
            'description' => 'Pengenalan penggunaan internet secara aman dan bertanggung jawab.',
            'content' => '
                <h3>Penggunaan Internet</h3>

                <p>
                    Internet dapat digunakan untuk mencari informasi,
                    belajar, berkomunikasi, dan berbagai kegiatan positif.
                </p>

                <h3>Keamanan Internet</h3>

                <p>
                    Jangan membagikan password kepada orang lain
                    dan berhati-hati ketika menerima informasi
                    dari internet.
                </p>
            ',
            'type' => 'materi',
            'is_published' => true,
        ]);
    }
}