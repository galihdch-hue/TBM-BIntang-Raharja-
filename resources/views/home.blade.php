<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>TBM Bintang Raharja</title>

    <meta
        name="description"
        content="TBM Bintang Raharja - Ruang belajar, membaca, berkarya, dan tumbuh bersama masyarakat."
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/home.css') }}"
    >
</head>


<body>

<div
    class="cursor-glow"
    aria-hidden="true"
></div>


{{-- =========================================================
     CUSTOM ICON MAPPING
========================================================= --}}

@php

    /*
    |--------------------------------------------------------------------------
    | ICON STATISTIK
    |--------------------------------------------------------------------------
    */

    $statIcons = [
        'Buku'        => 'stack-of-books.png',
        'Peserta'     => 'audience.png',
        'Kegiatan'    => 'calendar.png',
        'Kolaborasi'  => 'handshake (1).png',
    ];


    /*
    |--------------------------------------------------------------------------
    | ICON NILAI
    |--------------------------------------------------------------------------
    */

    $valueIcons = [
        'Literasi'      => 'literasi.png',
        'Kreativitas'   => 'kreativitas.png',
        'Kebersamaan'   => 'kebersamaan.png',
        'Pertumbuhan'   => 'pertumbuhan.png',
    ];

@endphp



{{-- =========================================================
     NAVBAR
========================================================= --}}

<header class="navbar">

    <div class="container navbar-content">

        {{-- LOGO --}}

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


        {{-- MENU NAVIGASI --}}

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


        {{-- LOGIN --}}

        <a
            href="{{ route('login') }}"
            class="login-button"
        >
            Masuk
        </a>

    </div>

</header>



{{-- =========================================================
     HERO
========================================================= --}}

<section class="hero">

    <div class="hero-background-shape shape-one"></div>
    <div class="hero-background-shape shape-two"></div>
    <div class="hero-background-shape shape-three"></div>


    <div class="container hero-content">


        {{-- HERO TEXT --}}

        <div
            class="hero-text reveal"
            data-delay="0"
        >

            <span class="hero-label">

                <img
                    src="{{ asset('images/star.png') }}"
                    alt="Icon"
                    style="width:22px;height:22px;object-fit:contain;"
                >

                RUANG BELAJAR • RUANG TUMBUH

            </span>


            <h1>

                Bersama Membaca,

                <span>
                    Bersama Tumbuh.
                </span>

            </h1>


            <p>

                TBM Bintang Raharja hadir sebagai ruang belajar
                masyarakat yang mendorong budaya literasi,
                kreativitas, kebersamaan, dan pertumbuhan
                generasi melalui kegiatan yang positif.

            </p>


            <div class="hero-buttons">

                <a
                    href="#kegiatan"
                    class="button primary"
                >

                    Jelajahi Kegiatan

                    <span>
                        →
                    </span>

                </a>


                <a
                    href="{{ route('about') }}"
                    class="button secondary"
                >

                    Kenali TBM

                </a>

            </div>



            {{-- HERO MINI INFORMATION --}}

            <div class="hero-mini-info">


                {{-- LITERASI --}}

                <div class="mini-info-item">

                    <div class="activity-placeholder">

                        <img
                            src="{{ asset('images/books.png') }}"
                            alt="Icon Literasi"
                        >

                    </div>


                    <div>

                        <span>
                            Fokus
                        </span>

                        <b>
                            Literasi
                        </b>

                    </div>

                </div>


                <div class="mini-info-divider"></div>


                {{-- PERTUMBUHAN --}}

                <div class="mini-info-item">

                    <div class="activity-placeholder">

                        <img
                            src="{{ asset('images/growth.png') }}"
                            alt="Icon Pertumbuhan"
                        >

                    </div>


                    <div>

                        <span>
                            Semangat
                        </span>

                        <b>
                            Bertumbuh
                        </b>

                    </div>

                </div>


                <div class="mini-info-divider"></div>


                {{-- KEBERSAMAAN --}}

                <div class="mini-info-item">

                    <div class="activity-placeholder">

                        <img
                            src="{{ asset('images/handshake.png') }}"
                            alt="Icon Kebersamaan"
                        >

                    </div>


                    <div>

                        <span>
                            Berbasis
                        </span>

                        <b>
                            Kebersamaan
                        </b>

                    </div>

                </div>

            </div>

        </div>



        {{-- HERO VISUAL --}}

        <div
            class="hero-visual reveal"
            data-delay="150"
        >

            <div class="hero-image-card">

                <div class="hero-image-glow"></div>


                <img
                    src="{{ asset('images/tentang.jpeg') }}"
                    alt="Kegiatan TBM Bintang Raharja"
                >


                <div class="hero-dots"></div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     STATISTIK
========================================================= --}}

<section class="stats-section">

    <div class="container">

        <div class="stats-grid">

            @foreach ($stats as $index => $stat)

                <div
                    class="stat-card reveal"
                    data-delay="{{ $index * 100 }}"
                >

                    <div class="stat-icon">

                        <img
                            src="{{ asset('images/' . ($statIcons[$stat['label']] ?? 'books.png')) }}"
                            alt="Icon {{ $stat['label'] }}"
                            style="
                                width:70%;
                                height:70%;
                                object-fit:contain;
                            "
                        >

                    </div>


                    <div>

                        <strong>
                            {{ $stat['number'] }}
                        </strong>

                        <span>
                            {{ $stat['label'] }}
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>



{{-- =========================================================
     INTRO / BRAND STATEMENT
========================================================= --}}

<section class="section intro-section">

    <div class="container">

        <div class="intro-grid">


            <div
                class="intro-label reveal"
            >

                <span>
                    TENTANG GERAKAN
                </span>

                <div class="intro-line"></div>

            </div>


            <div
                class="intro-content reveal"
                data-delay="100"
            >

                <h2>

                    Sebuah ruang kecil
                    untuk mimpi yang

                    <span>
                        besar.
                    </span>

                </h2>


                <p>

                    Kami percaya bahwa perubahan tidak selalu
                    dimulai dari sesuatu yang besar. Kadang,
                    semuanya dimulai dari sebuah buku, sebuah
                    kegiatan sederhana, dan seseorang yang mau
                    berbagi ilmu.

                </p>


                <a
                    href="{{ route('about') }}"
                    class="text-link"
                >

                    Pelajari perjalanan kami

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     KEGIATAN TERBARU
========================================================= --}}

<section
    class="section activities-section"
    id="kegiatan"
>

    <div class="container">


        <div
            class="section-header split-header reveal"
        >

            <div>

                <span class="section-label">
                    Kegiatan
                </span>


                <h2>

                    Belajar Tidak Harus

                    <span>
                        Membosankan.
                    </span>

                </h2>


                <p>

                    Berbagai kegiatan yang dirancang untuk
                    menghadirkan pengalaman belajar yang
                    menyenangkan dan bermakna.

                </p>

            </div>


            <a
                href="{{ route('activities.index') }}"
                class="see-all"
            >
                Lihat Semua Kegiatan →
            </a>

        </div>



        <div class="activity-grid">

            @forelse ($activities as $index => $activity)

                <article
                    class="activity-card reveal"
                    data-delay="{{ $index * 100 }}"
                >

                    <div class="activity-image">

                        @if (!empty($activity['image'] ?? null))

                            <img
                                src="{{ asset('storage/' . $activity['image']) }}"
                                alt="{{ $activity['title'] }}"
                            >

                        @else

                            <div class="activity-placeholder">

                                <img
                                    src="{{ asset('images/books.png') }}"
                                    alt="Icon Kegiatan"
                                    style="
                                        width:60px;
                                        height:60px;
                                        object-fit:contain;
                                    "
                                >

                            </div>

                        @endif


                        <div class="activity-overlay">

                            <span>
                                {{ $activity['category'] }}
                            </span>

                        </div>

                    </div>



                    <div class="activity-content">

                        <span class="category">
                            {{ $activity['category'] }}
                        </span>


                        <h3>
                            {{ $activity['title'] }}
                        </h3>


                        <div class="activity-meta">

                            <span>

                                <img
                                    src="{{ asset('images/calendar.png') }}"
                                    alt="Tanggal"
                                    style="
                                        width:15px;
                                        height:15px;
                                        object-fit:contain;
                                        vertical-align:middle;
                                    "
                                >

                                {{ $activity['date'] }}

                            </span>


                            <span>

                                <img
                                    src="{{ asset('images/clock.png') }}"
                                    alt="Waktu"
                                    style="
                                        width:15px;
                                        height:15px;
                                        object-fit:contain;
                                        vertical-align:middle;
                                    "
                                >

                                {{ $activity['time'] }}

                            </span>

                        </div>



                        @if (isset($activity['id']))

                            <a
                                href="{{ route('activities.show', $activity['id']) }}"
                                class="activity-link"
                            >

                                Lihat Detail

                                <span>
                                    →
                                </span>

                            </a>

                        @else

                            <a
                                href="{{ route('activities.index') }}"
                                class="activity-link"
                            >

                                Lihat Detail

                                <span>
                                    →
                                </span>

                            </a>

                        @endif

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">

                        <img
                            src="{{ asset('images/empty.png') }}"
                            alt="Belum ada kegiatan"
                            style="
                                width:55px;
                                height:55px;
                                object-fit:contain;
                            "
                        >

                    </div>


                    <h3>
                        Belum Ada Kegiatan
                    </h3>


                    <p>

                        Jadwal kegiatan TBM akan ditampilkan
                        di halaman ini.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>



{{-- =========================================================
     TENTANG TBM
========================================================= --}}

<section class="about-section">

    <div class="container about-grid">


        {{-- IMAGE --}}

        <div
            class="about-image reveal"
        >

            <div class="about-image-wrapper">

                <img
                    src="{{ asset('images/tentang.jpeg') }}"
                    alt="Kegiatan TBM Bintang Raharja"
                >

            </div>

        </div>



        {{-- CONTENT --}}

        <div
            class="about-content reveal"
            data-delay="150"
        >

            <span class="section-label">
                Tentang Kami
            </span>


            <h2>

                Tumbuh Bersama

                <span>
                    Melalui Literasi.
                </span>

            </h2>


            <p>

                TBM Bintang Raharja merupakan ruang belajar
                masyarakat yang berfokus pada kegiatan literasi,
                pendidikan, dan pengembangan kreativitas
                anak-anak.

            </p>


            <p>

                Melalui kegiatan bersama kakak pengajar,
                relawan, dan berbagai pihak yang berkolaborasi,
                anak-anak mendapatkan kesempatan untuk belajar,
                membaca, bermain, dan berkarya bersama.

            </p>



            <div class="about-points">


                <div class="about-point">

                    <span>

                        <img
                            src="{{ asset('images/book.png') }}"
                            alt="Check"
                            style="
                                width:18px;
                                height:18px;
                                object-fit:contain;
                            "
                        >

                    </span>

                    <p>
                        Lingkungan belajar yang positif
                    </p>

                </div>



                <div class="about-point">

                    <span>

                        <img
                            src="{{ asset('images/light bulb.png') }}"
                            alt="Check"
                            style="
                                width:18px;
                                height:18px;
                                object-fit:contain;
                            "
                        >

                    </span>

                    <p>
                        Kegiatan literasi dan kreativitas
                    </p>

                </div>



                <div class="about-point">

                    <span>

                        <img
                            src="{{ asset('images/handshake (2).png') }}"
                            alt="Check"
                            style="
                                width:18px;
                                height:18px;
                                object-fit:contain;
                            "
                        >

                    </span>

                    <p>
                        Kolaborasi bersama masyarakat
                    </p>

                </div>


            </div>


            <a
                href="{{ route('about') }}"
                class="button primary"
            >

                Kenali TBM

                <span>
                    →
                </span>

            </a>

        </div>

    </div>

</section>



{{-- =========================================================
     SEJARAH TBM
========================================================= --}}

<section class="section history-section">

    <div class="container">


        <div
            class="section-header center reveal"
        >

            <span class="section-label">
                Sejarah Kami
            </span>


            <h2>

                Dari Baling-Baling

                <span>
                    hingga Bintang Raharja.
                </span>

            </h2>


            <p>

                Setiap perjalanan memiliki awal. Inilah bagian
                dari perjalanan yang membentuk identitas
                TBM Bintang Raharja.

            </p>

        </div>



        <div class="history-timeline">


            <div class="history-item reveal">

                <div class="history-marker">
                    <span>01</span>
                </div>


                <div class="history-content">

                    <span class="history-year">
                        Awal Perjalanan
                    </span>


                    <h3>
                        Berawal dari Semangat Literasi
                    </h3>


                    <p>

                        TBM Bintang Raharja berawal dari sebuah
                        kegiatan dan kepedulian terhadap pentingnya
                        pendidikan serta budaya membaca di lingkungan
                        masyarakat.

                    </p>

                </div>

            </div>



            <div
                class="history-item reveal"
                data-delay="100"
            >

                <div class="history-marker">
                    <span>02</span>
                </div>


                <div class="history-content">

                    <span class="history-year">
                        Fase Awal
                    </span>


                    <h3>
                        Baling-Baling
                    </h3>


                    <p>

                        Pada masa awal perkembangannya, gerakan ini
                        dikenal dengan nama Baling-Baling. Nama tersebut
                        menjadi bagian penting dari perjalanan awal
                        sebelum berkembang menjadi TBM Bintang Raharja.

                    </p>

                </div>

            </div>



            <div
                class="history-item reveal"
                data-delay="200"
            >

                <div class="history-marker">
                    <span>03</span>
                </div>


                <div class="history-content">

                    <span class="history-year">
                        Perkembangan
                    </span>


                    <h3>
                        Berkembang Menjadi Ruang Belajar
                    </h3>


                    <p>

                        Seiring berkembangnya kegiatan, ruang ini
                        mulai menjadi tempat bagi anak-anak dan
                        masyarakat untuk membaca, belajar, bermain,
                        serta mengembangkan kreativitas.

                    </p>

                </div>

            </div>



            <div
                class="history-item reveal"
                data-delay="300"
            >

                <div class="history-marker">
                    <span>04</span>
                </div>


                <div class="history-content">

                    <span class="history-year">
                        TBM Bintang Raharja
                    </span>


                    <h3>
                        Tumbuh Bersama Masyarakat
                    </h3>


                    <p>

                        Perjalanan tersebut kemudian berkembang
                        menjadi TBM Bintang Raharja sebagai ruang
                        belajar masyarakat yang membawa semangat
                        membaca, belajar, berkarya, dan tumbuh bersama.

                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
     NILAI TBM
========================================================= --}}

<section class="section values-section">

    <div class="container">


        <div
            class="section-header center reveal"
        >

            <span class="section-label">
                Nilai Kami
            </span>


            <h2>
                Bukan Sekadar Tempat Membaca.
            </h2>


            <p>

                Kami membangun ruang yang mendorong
                anak-anak untuk belajar, berinteraksi,
                dan berkembang.

            </p>

        </div>



        <div class="values-grid">


            {{-- LITERASI --}}

            <div class="value-card reveal">

                <div class="value-icon">

                    <img
                        src="{{ asset('images/literasi.png') }}"
                        alt="Literasi"
                        style="
                            width:65%;
                            height:65%;
                            object-fit:contain;
                        "
                    >

                </div>


                <span class="value-number">
                    01
                </span>


                <h3>
                    Literasi
                </h3>


                <p>

                    Menumbuhkan kebiasaan membaca dan
                    meningkatkan minat belajar melalui
                    kegiatan yang menyenangkan.

                </p>

            </div>



            {{-- KREATIVITAS --}}

            <div
                class="value-card reveal"
                data-delay="100"
            >

                <div class="value-icon">

                    <img
                        src="{{ asset('images/kreativitas.png') }}"
                        alt="Kreativitas"
                        style="
                            width:65%;
                            height:65%;
                            object-fit:contain;
                        "
                    >

                </div>


                <span class="value-number">
                    02
                </span>


                <h3>
                    Kreativitas
                </h3>


                <p>

                    Memberikan ruang bagi anak-anak untuk
                    bereksperimen, berkarya, dan
                    mengembangkan ide.

                </p>

            </div>



            {{-- KEBERSAMAAN --}}

            <div
                class="value-card reveal"
                data-delay="200"
            >

                <div class="value-icon">

                    <img
                        src="{{ asset('images/kebersamaan.png') }}"
                        alt="Kebersamaan"
                        style="
                            width:65%;
                            height:65%;
                            object-fit:contain;
                        "
                    >

                </div>


                <span class="value-number">
                    03
                </span>


                <h3>
                    Kebersamaan
                </h3>


                <p>

                    Membangun lingkungan belajar yang
                    terbuka, ramah, dan saling mendukung.

                </p>

            </div>



            {{-- PERTUMBUHAN --}}

            <div
                class="value-card reveal"
                data-delay="300"
            >

                <div class="value-icon">

                    <img
                        src="{{ asset('images/pertumbuhan.png') }}"
                        alt="Pertumbuhan"
                        style="
                            width:65%;
                            height:65%;
                            object-fit:contain;
                        "
                    >

                </div>


                <span class="value-number">
                    04
                </span>


                <h3>
                    Pertumbuhan
                </h3>


                <p>

                    Mendukung perkembangan pengetahuan,
                    keterampilan, dan karakter anak-anak.

                </p>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
     WHAT WE BUILD
========================================================= --}}

<section class="section build-section">

    <div class="container">

        <div class="build-layout">


            <div class="build-heading reveal">

                <span class="section-label">
                    Dampak
                </span>


                <h2>

                    Ruang yang

                    <span>
                        Menghidupkan
                    </span>

                    Potensi.

                </h2>


                <p>

                    Setiap kegiatan dirancang untuk memberikan
                    pengalaman yang tidak hanya menyenangkan,
                    tetapi juga memberikan ruang bagi anak-anak
                    untuk berkembang.

                </p>

            </div>



            <div class="build-list">


                <div
                    class="build-item reveal"
                    data-delay="0"
                >

                    <span class="build-icon">
                        01
                    </span>

                    <div>

                        <h3>
                            Membaca
                        </h3>

                        <p>
                            Mengenalkan dan membangun kebiasaan
                            membaca sejak dini.
                        </p>

                    </div>

                </div>



                <div
                    class="build-item reveal"
                    data-delay="100"
                >

                    <span class="build-icon">
                        02
                    </span>

                    <div>

                        <h3>
                            Belajar
                        </h3>

                        <p>
                            Menciptakan suasana belajar yang
                            terbuka dan menyenangkan.
                        </p>

                    </div>

                </div>



                <div
                    class="build-item reveal"
                    data-delay="200"
                >

                    <span class="build-icon">
                        03
                    </span>

                    <div>

                        <h3>
                            Berkarya
                        </h3>

                        <p>
                            Memberikan ruang untuk menghasilkan
                            karya dan mengembangkan kreativitas.
                        </p>

                    </div>

                </div>



                <div
                    class="build-item reveal"
                    data-delay="300"
                >

                    <span class="build-icon">
                        04
                    </span>

                    <div>

                        <h3>
                            Berkolaborasi
                        </h3>

                        <p>
                            Menghubungkan anak-anak, relawan,
                            masyarakat, dan berbagai pihak.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     MILESTONE
========================================================= --}}

<section class="section milestone-section">

    <div class="container">


        <div
            class="section-header center reveal"
        >

            <span class="section-label">
                Milestone
            </span>


            <h2>

                Langkah yang Terus

                <span>
                    Bertumbuh.
                </span>

            </h2>


            <p>

                Perjalanan TBM Bintang Raharja dibangun
                dari langkah-langkah kecil yang dilakukan
                secara bersama-sama.

            </p>

        </div>



        <div class="milestone-grid">


            <div class="milestone-card reveal">

                <span class="milestone-number">
                    01
                </span>

                <div>

                    <h3>
                        Memulai Gerakan
                    </h3>

                    <p>
                        Membangun ruang awal untuk kegiatan
                        belajar dan literasi masyarakat.
                    </p>

                </div>

            </div>



            <div
                class="milestone-card reveal"
                data-delay="100"
            >

                <span class="milestone-number">
                    02
                </span>

                <div>

                    <h3>
                        Mengembangkan Kegiatan
                    </h3>

                    <p>
                        Menghadirkan kegiatan membaca, belajar,
                        bermain, dan berkarya.
                    </p>

                </div>

            </div>



            <div
                class="milestone-card reveal"
                data-delay="200"
            >

                <span class="milestone-number">
                    03
                </span>

                <div>

                    <h3>
                        Memperluas Kolaborasi
                    </h3>

                    <p>
                        Membangun hubungan dengan relawan,
                        masyarakat, dan berbagai pihak.
                    </p>

                </div>

            </div>



            <div
                class="milestone-card reveal"
                data-delay="300"
            >

                <span class="milestone-number">
                    04
                </span>

                <div>

                    <h3>
                        Tumbuh Bersama
                    </h3>

                    <p>
                        Terus berkembang sebagai ruang belajar
                        dan berkarya bagi masyarakat.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
     KOLABORASI
========================================================= --}}

<section class="section partners-section">

    <div class="container">


        <div
            class="section-header center reveal"
        >

            <span class="section-label">
                Kolaborasi
            </span>


            <h2>
                Bersama Membangun Generasi.
            </h2>


            <p>

                TBM Bintang Raharja tumbuh melalui
                kolaborasi dengan berbagai pihak.

            </p>

        </div>



        @php
    $partnerIcons = [
        'President University.jpeg',
        'naresuan university.jpeg',
        'Universiti Utara Malaysia.png',
        'Yayasan Bersatu Membangun Indonesia.jpeg',
    ];
@endphp

<div class="partners-grid">

    @foreach ($partners as $index => $partner)

        <div
            class="partner-card reveal"
            data-delay="{{ $index * 100 }}"
        >

            <div class="partner-icon">

                <img
                    src="{{ asset('images/' . ($partnerIcons[$index] ?? 'default-partner.png')) }}"
                    alt="{{ $partner }}"
                >

            </div>

            <strong>
                {{ $partner }}
            </strong>

            <span>
                Partner & Kolaborator
            </span>

        </div>

    @endforeach

    </div>

</section>



{{-- =========================================================
     FINAL CTA
========================================================= --}}

<section class="cta-section">

    <div class="cta-orb orb-one"></div>
    <div class="cta-orb orb-two"></div>


    <div class="container cta-content reveal">


        <span>

            <img
                src="{{ asset('images/star.png') }}"
                alt="Icon"
                style="
                    width:20px;
                    height:20px;
                    object-fit:contain;
                    vertical-align:middle;
                "
            >

            TBM BINTANG RAHARJA

        </span>


        <h2>

            Satu Buku.
            Satu Ide.

            <br>

            Satu Langkah Menuju Masa Depan.

        </h2>


        <p>

            Bersama membaca, belajar, berkarya,
            dan menciptakan ruang tumbuh untuk
            generasi yang lebih baik.

        </p>


        <div class="cta-buttons">

            <a
                href="{{ route('activities.index') }}"
                class="button primary"
            >

                Lihat Kegiatan

                <span>
                    →
                </span>

            </a>


            <a
                href="{{ route('contact.index') }}"
                class="button secondary"
            >

                Hubungi Kami

            </a>

        </div>

    </div>

</section>



{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="footer">

    <div class="container footer-content">


        {{-- BRAND --}}

        <div class="footer-brand">

            <div class="footer-logo">

                <div class="footer-logo-icon">

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

            </div>


            <p>

                Ruang belajar masyarakat yang hadir untuk
                menumbuhkan budaya literasi, kreativitas,
                dan kebersamaan.

            </p>

        </div>



        {{-- NAVIGASI --}}

        <div class="footer-column">

            <h3>
                Navigasi
            </h3>

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

        </div>



        {{-- INFORMASI --}}

        <div class="footer-column">

            <h3>
                Jelajahi
            </h3>

            <a href="{{ route('gallery.index') }}">
                Galeri
            </a>

            <a href="{{ route('contact.index') }}">
                Kontak
            </a>

            <a href="{{ route('login') }}">
                Masuk
            </a>

        </div>

    </div>



    {{-- FOOTER BOTTOM --}}

    <div class="container footer-bottom">

        <p>

            © {{ date('Y') }}
            TBM Bintang Raharja.
            All rights reserved.

        </p>


        <span>
            Dibangun dengan semangat literasi dan kolaborasi.
        </span>

    </div>

</footer>



{{-- =========================================================
     SCROLL ANIMATION
========================================================= --}}

<script>

document.addEventListener("DOMContentLoaded", function () {

    const revealElements =
        document.querySelectorAll(".reveal");


    const observer =
        new IntersectionObserver(

            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        const delay =
                            entry.target.dataset.delay || 0;


                        setTimeout(function () {

                            entry.target.classList.add(
                                "revealed"
                            );

                        }, delay);


                        observer.unobserve(
                            entry.target
                        );

                    }

                });

            },

            {
                threshold: 0.12
            }

        );


    revealElements.forEach(function (element) {

        observer.observe(element);

    });

});

</script>


</body>
</html>