<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $history = [

    [
        'year' => '10 Januari 2020',
        'title' => 'Awal Berdirinya TBM Bintang Raharja',
        'description' => 'TBM Bintang Raharja berdiri pada 10 Januari 2020 di Desa Karangraharja, Kecamatan Cikarang Utara, Kabupaten Bekasi. TBM ini dibentuk sebagai wadah untuk memberikan layanan bahan bacaan kepada masyarakat serta mendorong tumbuhnya budaya membaca dan belajar.'
    ],

    [
        'year' => '2020',
        'title' => 'Awal Gerakan Baling-baling Bintang Raharja',
        'description' => 'Pada masa pandemi COVID-19, kegiatan belajar tatap muka di sekolah terhenti. Melihat kondisi tersebut, Ibu Murni Setianingsih berinisiatif mengajak anak-anak di lingkungan sekitar untuk tetap belajar dan membaca. Gerakan ini dikenal dengan nama Baling-baling Bintang Raharja.'
    ],

    [
        'year' => '2020–2021',
        'title' => 'Berkeliling dengan Gerobak Es Mambo',
        'description' => 'Salah satu cara awal menggerakkan kegiatan literasi dilakukan dengan menggunakan gerobak es mambo untuk berkeliling di lingkungan Perumahan Puri Mutiara Indah. Gerobak tersebut digunakan untuk mengumpulkan anak-anak agar dapat berkumpul, membaca buku, dan mengikuti kegiatan edukatif.'
    ],

    [
        'year' => '2021',
        'title' => 'Baling-baling Mulai Berkembang',
        'description' => 'Kegiatan Baling-baling Bintang Raharja kemudian dilaksanakan secara rutin setiap hari Minggu dengan berkeliling ke musala dan masjid di lingkungan Perumahan Puri Mutiara Indah. Kegiatan yang dilakukan meliputi senam, membaca, bernyanyi, mewarnai, menulis, dan mendongeng.'
    ],

    [
        'year' => '2021',
        'title' => 'Masyarakat Mulai Terlibat',
        'description' => 'Dalam perkembangannya, sekitar 25 warga yang terdiri dari ibu-ibu rumah tangga dan remaja di lingkungan RW 08 ikut menjadi penggerak kegiatan literasi. Setiap pertemuan yang berlangsung sekitar dua jam dapat diikuti sekitar 50 sampai 100 anak.'
    ],

    [
        'year' => '2023',
        'title' => 'Berkembang Menjadi Rumah Pendidikan dan Keterampilan',
        'description' => 'TBM Bintang Raharja berkembang dengan konsep Rumah Pendidikan dan Keterampilan atau Rumah Dilan. Program ini tidak hanya berfokus pada kegiatan membaca, tetapi juga mencakup pendidikan, keterampilan, kreativitas anak, pemberdayaan masyarakat, serta kegiatan untuk ibu-ibu.'
    ],

    [
        'year' => '2023',
        'title' => 'Penguatan Program dan Pemberdayaan Masyarakat',
        'description' => 'Rumah Dilan TBM Bintang Raharja mulai menjalankan berbagai kegiatan seperti pelatihan keterampilan bagi ibu-ibu, kegiatan menari, pelatihan komputer untuk anak-anak, serta pengelolaan bank sampah melalui dukungan dan kolaborasi dengan berbagai pihak.'
    ],

    [
        'year' => '2023',
        'title' => 'Meraih Juara 1 Tingkat Jawa Barat',
        'description' => 'Program Rumah Dilan TBM Bintang Raharja mendapatkan prestasi sebagai juara 1 dalam lomba Rumah Dilan tingkat Provinsi Jawa Barat. Prestasi tersebut menjadi salah satu bagian penting dalam perkembangan TBM Bintang Raharja sebagai ruang literasi dan pemberdayaan masyarakat.'
    ],

    [
        'year' => '2024',
        'title' => 'Memperluas Kegiatan dan Kolaborasi',
        'description' => 'Memasuki tahun 2024, Rumah Dilan TBM Bintang Raharja terus mengembangkan kegiatan edukasi dan pemberdayaan masyarakat. Salah satunya melalui workshop UMKM Go-Digital bersama President University yang diikuti sekitar 80 peserta.'
    ],

    [
        'year' => '2024',
        'title' => 'Mendapat Dukungan Buku',
        'description' => 'TBM Bintang Raharja juga mendapatkan dukungan literasi melalui donasi 500 buku dari Yayasan Bersatu Membangun Indonesia. Dukungan tersebut ditujukan untuk membantu meningkatkan minat baca dan semangat literasi masyarakat.'
    ],

    [
        'year' => '2025',
        'title' => 'Dukungan Literasi Terus Berlanjut',
        'description' => 'Pada 31 Januari 2025, TBM Bintang Raharja kembali mendapatkan dukungan melalui donasi 250 buku. Kegiatan ini menjadi bagian dari keberlanjutan dukungan terhadap TBM dalam mengembangkan budaya membaca dan kegiatan literasi masyarakat.'
    ],

    [
        'year' => 'Sekarang',
        'title' => 'TBM Bintang Raharja Terus Berkembang',
        'description' => 'Dari gerakan sederhana Baling-baling yang berawal dari berkeliling menggunakan gerobak es mambo, TBM Bintang Raharja terus berkembang menjadi ruang belajar, literasi, kreativitas, keterampilan, dan pemberdayaan masyarakat di Desa Karangraharja, Kecamatan Cikarang Utara.'
    ],

];

        $values = [
            [
                'icon' => '📚',
                'title' => 'Literasi',
                'description' => 'Mendorong kebiasaan membaca dan meningkatkan pengetahuan anak-anak.'
            ],
            [
                'icon' => '💡',
                'title' => 'Pembelajaran',
                'description' => 'Menciptakan kegiatan belajar yang menyenangkan dan bermanfaat.'
            ],
            [
                'icon' => '🎨',
                'title' => 'Kreativitas',
                'description' => 'Memberikan ruang bagi anak-anak untuk mengembangkan kreativitas.'
            ],
            [
                'icon' => '🤝',
                'title' => 'Kebersamaan',
                'description' => 'Membangun lingkungan belajar melalui kerja sama dan kepedulian.'
            ],
        ];

        return view('about', compact(
            'history',
            'values'
        ));
    }
}