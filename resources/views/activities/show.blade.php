<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $activity->title }} - TBM Bintang Raharja
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/activities.css') }}"
    >

</head>


<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

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

            <a
                href="{{ route('activities.index') }}"
                class="active"
            >
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


{{-- =========================================================
     DETAIL
========================================================= --}}

<main class="detail-section">


    <div class="detail-bg-orb detail-orb-one"></div>
    <div class="detail-bg-orb detail-orb-two"></div>
    <div class="detail-bg-orb detail-orb-three"></div>

    <div class="detail-grid-bg"></div>


    <div class="detail-container">


        {{-- BACK --}}

        <a
            href="{{ route('activities.index') }}"
            class="back-button"
        >

            <span>
                ←
            </span>

            Kembali ke Kegiatan

        </a>


        {{-- CARD --}}

        <article class="detail-card">


            {{-- IMAGE --}}

            <div class="detail-image">

                @if($activity->image)

                    <img
                        src="{{ asset('storage/' . $activity->image) }}"
                        alt="{{ $activity->title }}"
                    >

                    <div class="detail-image-overlay"></div>

                    <div class="detail-image-shine"></div>

                @else

                    <div class="detail-default-image">

                        <div>
                            📚
                        </div>

                        <strong>
                            TBM Bintang Raharja
                        </strong>

                        <small>
                            Kegiatan & Program
                        </small>

                    </div>

                @endif


                <div class="detail-image-badge">

                    <span></span>

                    KEGIATAN TBM

                </div>

            </div>


            {{-- CONTENT --}}

            <div class="detail-content">


                <span class="detail-category">

                    <i>
                        ✦
                    </i>

                    {{ $activity->category ?? 'Kegiatan' }}

                </span>


                <h1 class="detail-title">
                    {{ $activity->title }}
                </h1>


                <div class="detail-title-line"></div>


                {{-- META --}}

                <div class="detail-meta">


                    @if($activity->date)

                        <div class="meta-item">

                            <div class="meta-icon meta-green">
                                📅
                            </div>

                            <div>

                                <small>
                                    Tanggal
                                </small>

                                <strong>
                                    {{ \Carbon\Carbon::parse($activity->date)->translatedFormat('l, d F Y') }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($activity->start_time && $activity->end_time)

                        <div class="meta-item">

                            <div class="meta-icon meta-blue">
                                🕐
                            </div>

                            <div>

                                <small>
                                    Waktu
                                </small>

                                <strong>

                                    {{ \Carbon\Carbon::parse($activity->start_time)->format('H:i') }}

                                    -

                                    {{ \Carbon\Carbon::parse($activity->end_time)->format('H:i') }}

                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($activity->location)

                        <div class="meta-item">

                            <div class="meta-icon meta-purple">
                                📍
                            </div>

                            <div>

                                <small>
                                    Lokasi
                                </small>

                                <strong>
                                    {{ $activity->location }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($activity->instructor)

                        <div class="meta-item">

                            <div class="meta-icon meta-yellow">
                                👤
                            </div>

                            <div>

                                <small>
                                    Pengajar
                                </small>

                                <strong>
                                    {{ $activity->instructor }}
                                </strong>

                            </div>

                        </div>

                    @endif


                </div>


                {{-- DESCRIPTION --}}

                <div class="detail-divider"></div>


                <div class="description">

                    <span class="description-label">
                        ABOUT ACTIVITY
                    </span>

                    <h2>
                        Tentang Kegiatan
                    </h2>

                    <p>
                        {{ $activity->description
                            ?? 'Kegiatan pembelajaran yang diselenggarakan oleh TBM Bintang Raharja.' }}
                    </p>

                </div>


            </div>

        </article>


        {{-- BOTTOM CTA --}}

        <div class="detail-bottom">


            <div class="detail-bottom-glow"></div>


            <div class="cta-decoration">

                <span></span>
                <span></span>
                <span></span>

            </div>


            <div class="cta-text">

                <span>
                    MAU IKUT KEGIATAN LAIN?
                </span>

                <strong>
                    Temukan kegiatan menarik lainnya.
                </strong>

                <small>
                    Masih banyak program belajar
                    dan aktivitas seru di TBM Bintang Raharja.
                </small>

            </div>


            <a
                href="{{ route('activities.index') }}"
                class="detail-button"
            >

                <span>
                    Lihat Kegiatan Lainnya
                </span>

                <b>
                    →
                </b>

            </a>

        </div>


    </div>

</main>


{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="footer">

    <div class="footer-glow"></div>

    <div class="footer-container">


        <div class="footer-brand">

            <div class="footer-logo">

                <img
                    src="{{ asset('images/logoTBMfinal.png') }}"
                    alt="TBM Bintang Raharja"
                >

            </div>


            <div>

                <strong>
                    TBM Bintang Raharja
                </strong>

                <p>
                    Ruang belajar, membaca,
                    dan berkarya untuk masyarakat.
                </p>

            </div>

        </div>


        <div class="footer-links">

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

        </div>

    </div>


    <div class="footer-bottom">

        <p>
            © {{ date('Y') }}
            TBM Bintang Raharja.
            Semua hak dilindungi.
        </p>

    </div>

</footer>


<script>

document.addEventListener('DOMContentLoaded', () => {

    const section =
        document.querySelector('.detail-section');

    const card =
        document.querySelector('.detail-card');


    /* POINTER SPOTLIGHT */

    if (section) {

        section.addEventListener(
            'pointermove',
            event => {

                const rect =
                    section.getBoundingClientRect();

                section.style.setProperty(
                    '--mouse-x',
                    `${event.clientX - rect.left}px`
                );

                section.style.setProperty(
                    '--mouse-y',
                    `${event.clientY - rect.top}px`
                );

            }
        );

    }


    /* CARD 3D */

    if (card) {

        card.addEventListener(
            'pointermove',
            event => {

                if (window.innerWidth < 900) {
                    return;
                }

                const rect =
                    card.getBoundingClientRect();


                const x =
                    event.clientX -
                    rect.left;


                const y =
                    event.clientY -
                    rect.top;


                const rotateY =
                    ((x / rect.width) - .5) * 2;


                const rotateX =
                    ((y / rect.height) - .5) * -2;


                card.style.transform =
                    `
                    perspective(1400px)
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg)
                    translateY(-6px)
                    `;

            }
        );


        card.addEventListener(
            'pointerleave',
            () => {

                card.style.transform =
                    '';

            }
        );

    }


    /* SCROLL PROGRESS */

    const progress =
        document.createElement('div');

    progress.className =
        'page-progress';

    document.body.appendChild(
        progress
    );


    const updateProgress = () => {

        const top =
            window.scrollY;

        const height =
            document.documentElement.scrollHeight -
            window.innerHeight;

        progress.style.width =
            `${height > 0
                ? (top / height) * 100
                : 0}%`;

    };


    updateProgress();

    window.addEventListener(
        'scroll',
        updateProgress,
        { passive: true }
    );

});

</script>


</body>
</html>