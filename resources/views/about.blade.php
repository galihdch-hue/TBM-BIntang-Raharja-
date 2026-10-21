<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Tentang TBM Bintang Raharja
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/about.css') }}"
    >

</head>


<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

<header class="navbar">

    <div class="container navbar-content">

        <a
            href="{{ route('home') }}"
            class="logo"
        >

            <div class="logo-icon">

                <img
                    src="{{ asset('images/logoTBMfinal.png') }}"
                    alt="Logo TBM Bintang Raharja"
                >

            </div>

            <div>

                <strong>
                    TBM Bintang Raharja
                </strong>

                <span>
                    Membaca • Belajar • Berkarya • Bersama
                </span>

            </div>

        </a>


        <nav class="nav-menu">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('about') }}">
                Tentang
            </a>

            <a href="{{ route('activities.index') }}">
                Kegiatan
            </a>

            <a href="{{ route('news.index') }}">
                Berita
            </a>

            <a href="{{ route('gallery.index') }}">
                Galeri
            </a>

            <a href="{{ route('contact.index') }}">
                Kontak
            </a>

        </nav>


        <a
            href="{{ route('login') }}"
            class="login-button"
        >
            Masuk
        </a>

    </div>

</header>



{{-- =====================================================
     HERO
===================================================== --}}

<section class="about-hero">

    <div class="container">

        <span class="hero-label">
            TENTANG KAMI
        </span>

        <h1>

            Mengenal Lebih Dekat

            <span>
                TBM Bintang Raharja
            </span>

        </h1>

        <p>
            Mengenal perjalanan, semangat, dan nilai-nilai
            yang menjadi bagian dari TBM Bintang Raharja
            dalam mendukung kegiatan literasi dan pembelajaran.
        </p>

    </div>

</section>



{{-- =====================================================
     ABOUT
===================================================== --}}

<section class="section">

    <div class="container about-grid">


        {{-- FOTO DI KIRI --}}

        <div class="about-image">

            <div class="image-placeholder">

                <img
                    src="{{ asset('images/logoTBMfinal.png') }}"
                    alt="TBM Bintang Raharja"
                >

            </div>

        </div>


        {{-- TEKS DI KANAN --}}

        <div class="about-text">

            <span class="section-label">
                TENTANG TBM
            </span>

            <h2>
                Tempat untuk
                <span>
                    Belajar dan Berkarya
                </span>
            </h2>

            <p>
                TBM Bintang Raharja merupakan ruang belajar masyarakat
                yang berfokus pada kegiatan literasi, pendidikan, dan
                pengembangan kreativitas anak-anak.
            </p>

            <p>
                Melalui kegiatan yang dilaksanakan bersama kakak pengajar,
                relawan, dan berbagai pihak, anak-anak mendapatkan kesempatan
                untuk belajar, membaca, bermain, dan berkarya bersama.
            </p>

        </div>

    </div>

</section>



{{-- =====================================================
     BIOGRAFI IBU MURNI SETIANINGSIH
===================================================== --}}

<section class="biography-section">

    <div class="container">

        <div class="section-heading">

            <span>
                Tokoh di Balik TBM
            </span>

            <h2>
                Mengenal Ibu Murni Setianingsih
            </h2>

            <p>
                Sosok yang turut menggerakkan kegiatan literasi
                dan pendidikan masyarakat melalui TBM Bintang Raharja.
            </p>

        </div>


        <div class="biography-card">


            {{-- FOTO SEBELAH KIRI --}}

            <div class="biography-photo">

                <div class="photo-frame">

                    <img
                        src="{{ asset('images/bu murni.jpeg') }}"
                        alt="Ibu Murni Setianingsih"
                    >

                </div>


                <div class="photo-caption">

                    <strong>
                        Ibu Murni Setianingsih, S.Pd.
                    </strong>

                    <span>
                        Ketua TBM Bintang Raharja
                    </span>

                </div>

            </div>



            {{-- TEKS SEBELAH KANAN --}}

            <div class="biography-content">

                <span class="biography-label">
                    BIOGRAFI
                </span>

                <h3>
                    Menggerakkan Literasi dari Lingkungan Masyarakat
                </h3>

                <p>
                    Ibu Murni Setianingsih merupakan sosok yang
                    terlibat dalam berdirinya dan berkembangnya
                    TBM Bintang Raharja di Desa Karangharja,
                    Kecamatan Cikarang Utara, Kabupaten Bekasi.
                </p>

                <p>
                    Gagasan tersebut berawal dari kepedulian terhadap
                    anak-anak di lingkungan sekitar. Pada masa pandemi,
                    ketika kegiatan belajar tatap muka di sekolah
                    terhenti, beliau berinisiatif mengajak anak-anak
                    untuk tetap belajar dan membaca bersama.
                </p>

                <p>
                    Salah satu langkah awal yang dilakukan adalah
                    menggunakan gerobak es mambo untuk berkeliling
                    mengumpulkan anak-anak agar berkumpul, membaca,
                    dan melakukan berbagai kegiatan edukatif.
                </p>

                <p>
                    Dari gerakan sederhana tersebut, kegiatan literasi
                    terus berkembang dan melibatkan masyarakat sekitar.
                    TBM Bintang Raharja kemudian berkembang menjadi
                    ruang belajar yang tidak hanya berfokus pada
                    membaca, tetapi juga pendidikan, keterampilan,
                    kreativitas, dan pemberdayaan masyarakat.
                </p>

                <p>
                    Dalam perkembangannya, Ibu Murni juga aktif
                    mendorong program Rumah Pendidikan dan Keterampilan
                    atau Rumah Dilan. Program tersebut mencakup kegiatan
                    literasi anak, pelatihan keterampilan bagi ibu-ibu,
                    kegiatan menari, hingga pelatihan komputer bagi
                    anak-anak.
                </p>


                {{-- HIGHLIGHT ICON CUSTOM --}}

                <div class="biography-highlight">

                    <div class="highlight-icon">

                        <img
                            src="{{ asset('images/biografi.png') }}"
                            alt="Icon Biografi"
                        >

                    </div>

                    <div>

                        <strong>
                            Membangun dari hal sederhana
                        </strong>

                        <p>
                            Semangat literasi tumbuh dari kepedulian
                            terhadap lingkungan dan kebutuhan masyarakat.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     VISI MISI
===================================================== --}}

<section class="vision-section">

    <div class="container vision-grid">


        {{-- VISI --}}

        <div class="vision-card">

            <div class="vision-icon">

                <img
                    src="{{ asset('images/visi.png') }}"
                    alt="Icon Visi"
                >

            </div>

            <span class="section-label">
                Visi
            </span>

            <h2>
                Membangun Generasi
                yang Gemar Belajar
            </h2>

            <p>
                “Menjadi ruang literasi dan pembelajaran yang inspiratif
                untuk membentuk generasi yang berpengetahuan, kreatif,
                adaptif terhadap teknologi, dan siap menghadapi masa depan.”
            </p>

        </div>



        {{-- MISI --}}

        <div class="vision-card">

            <div class="vision-icon">

                <img
                    src="{{ asset('images/misi.png') }}"
                    alt="Icon Misi"
                >

            </div>

            <span class="section-label">
                Misi
            </span>

            <h2>
                Membuka Ruang
                untuk Berkembang
            </h2>

            <p>

                1. Menumbuhkan budaya membaca dan belajar melalui kegiatan
                literasi yang menarik, interaktif, dan relevan dengan
                perkembangan zaman.
                <br>

                2. Meningkatkan literasi digital dan teknologi agar
                anak-anak dan masyarakat mampu memanfaatkan teknologi
                secara positif, aman, dan produktif.
                <br>

                3. Mengembangkan kreativitas dan keterampilan melalui
                kegiatan edukatif, seni, keterampilan, dan pembelajaran
                berbasis praktik.
                <br>

                4. Mendorong kemandirian dan potensi masyarakat dengan
                menyediakan ruang untuk belajar, berkarya, berbagi,
                dan mengembangkan kemampuan.

            </p>

        </div>

    </div>

</section>



{{-- =====================================================
     SEJARAH
===================================================== --}}

<section class="section history-section">

    <div class="container">


        <div class="section-header">

            <span class="section-label">
                Perjalanan Kami
            </span>

            <h2>
                Sejarah TBM Bintang Raharja
            </h2>

            <p>
                Perjalanan TBM dalam membangun ruang
                literasi dan pembelajaran bagi masyarakat.
            </p>

        </div>


        <div class="timeline">

            @foreach ($history as $item)

                <div class="timeline-item">

                    <div class="timeline-dot">
                    </div>

                    <div class="timeline-content">

                        <span class="timeline-year">
                            {{ $item['year'] }}
                        </span>

                        <h3>
                            {{ $item['title'] }}
                        </h3>

                        <p>
                            {{ $item['description'] }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>



{{-- =====================================================
     NILAI
===================================================== --}}

<section class="section values-section">

    <div class="container">


        <div class="section-header center">

            <span class="section-label">
                Nilai Kami
            </span>

            <h2>
                Apa yang Kami Bangun
            </h2>

            <p>
                Nilai yang menjadi dasar dalam setiap
                kegiatan TBM Bintang Raharja.
            </p>

        </div>


        {{-- =================================================
             ICON CUSTOM NILAI
        ================================================== --}}

        @php

            $customValueIcons = [

                'Literasi.png',
                'pembelajaran.png',
                'kreativitas.png',
                'kebersamaan.png',

            ];

        @endphp


        <div class="values-grid">

            @foreach ($values as $index => $value)

                <div class="value-card">

                    <div class="value-icon">

                        <img
                            src="{{ asset('images/' . ($customValueIcons[$index] ?? 'icon-nilai-1.png')) }}"
                            alt="{{ $value['title'] }}"
                        >

                    </div>

                    <h3>
                        {{ $value['title'] }}
                    </h3>

                    <p>
                        {{ $value['description'] }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>



{{-- =====================================================
     CTA
===================================================== --}}

<section class="cta-section">

    <div class="container">

        <span class="cta-brand">

            <img
                src="{{ asset('images/star.png') }}"
                alt="Icon TBM"
            >

            TBM Bintang Raharja

        </span>

        <h2>
            Bersama Membaca,
            Bersama Tumbuh.
        </h2>

        <p>
            Mari menjadi bagian dari perjalanan
            literasi dan pembelajaran bersama.
        </p>

        <a
            href="{{ route('home') }}"
            class="button white"
        >
            Kembali ke Beranda
        </a>

    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

<footer class="footer">

    <div class="container footer-content">


        <div>

            <h3 class="footer-brand">

                <img
                    src="{{ asset('images/logoTBMfinal.png') }}"
                    alt="Logo TBM Bintang Raharja"
                >

                TBM Bintang Raharja

            </h3>

            <p>
                Membaca • Belajar • Berkarya • Bersama
            </p>

        </div>


        <p>

            © {{ date('Y') }}

            TBM Bintang Raharja.

        </p>

    </div>

</footer>



{{-- =====================================================
     CUSTOM ICON STYLE
===================================================== --}}

<style>

    /* =====================================================
       CUSTOM ICON
    ===================================================== */

    .highlight-icon,
    .vision-icon,
    .value-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* BIOGRAFI */

    .highlight-icon img {
        width: 42px;
        height: 42px;

        object-fit: contain;

        display: block;

        transition:
            transform .35s ease,
            filter .35s ease;
    }


    .biography-highlight:hover .highlight-icon img {
        transform: scale(1.08);
    }


    /* VISI & MISI */

    .vision-icon img {
        width: 48px;
        height: 48px;

        object-fit: contain;

        display: block;

        transition:
            transform .35s ease,
            filter .35s ease;
    }


    .vision-card:hover .vision-icon img {
        transform:
            scale(1.08)
            rotate(-3deg);
    }


    /* NILAI */

    .value-icon img {
        width: 42px;
        height: 42px;

        object-fit: contain;

        display: block;

        transition:
            transform .35s ease,
            filter .35s ease;
    }


    .value-card:hover .value-icon img {
        transform:
            scale(1.1)
            rotate(-3deg);
    }


    /* CTA */

    .cta-brand {
        display: inline-flex;

        align-items: center;

        gap: 10px;
    }


    .cta-brand img {
        width: 32px;
        height: 32px;

        object-fit: contain;

        display: block;

        transition:
            transform .35s ease;
    }


    .cta-brand:hover img {
        transform: scale(1.1);
    }


    /* FOOTER */

    .footer-brand {
        display: flex;

        align-items: center;

        gap: 10px;
    }


    .footer-brand img {
        width: 34px;
        height: 34px;

        object-fit: contain;

        display: block;
    }


    /* RESPONSIVE */

    @media (max-width: 768px) {

        .highlight-icon img {
            width: 36px;
            height: 36px;
        }


        .vision-icon img {
            width: 42px;
            height: 42px;
        }


        .value-icon img {
            width: 38px;
            height: 38px;
        }


        .cta-brand img {
            width: 28px;
            height: 28px;
        }


        .footer-brand img {
            width: 30px;
            height: 30px;
        }

    }

</style>


</body>

</html>