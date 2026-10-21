<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Berita - TBM Bintang Raharja
    </title>

    <meta
        name="description"
        content="Berita dan informasi terbaru TBM Bintang Raharja."
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/news.css') }}"
    >

</head>


<body>

<div class="page-noise"></div>

<div class="cursor-light"></div>


{{-- =========================================================
     NAVBAR
========================================================= --}}

<header class="navbar">

    <div class="navbar-container">


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


        {{-- NAVIGASI --}}

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

            <a
                href="{{ route('news.index') }}"
                class="active"
            >
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
     TOP COLOR LINE
========================================================= --}}

<div class="rainbow-line"></div>



{{-- =========================================================
     HERO
========================================================= --}}

<section class="news-hero">


    {{-- BACKGROUND ORBS --}}

    <div class="hero-orb orb-green"></div>
    <div class="hero-orb orb-blue"></div>
    <div class="hero-orb orb-purple"></div>
    <div class="hero-orb orb-yellow"></div>


    {{-- DECORATION --}}

    <div class="hero-ring ring-one"></div>
    <div class="hero-ring ring-two"></div>


    <div class="container hero-container">


        {{-- LABEL --}}

        <div class="hero-label-wrap">

            <span class="hero-dot"></span>

            <span class="hero-label">
                INFORMASI TERKINI
            </span>

            <span class="hero-dot"></span>

        </div>


        {{-- TITLE --}}

        <h1>

            Berita &

            <span>
                Informasi TBM
            </span>

        </h1>


        {{-- UNDERLINE --}}

        <div class="hero-line">

            <span></span>
            <span></span>
            <span></span>

        </div>


        {{-- DESCRIPTION --}}

        <p>

            Temukan informasi terbaru mengenai kegiatan,
            program, kolaborasi, dan perkembangan
            <strong>
                TBM Bintang Raharja.
            </strong>

        </p>


        {{-- FLOATING DECORATION --}}

        <div class="floating-shape shape-a">
            +
        </div>

        <div class="floating-shape shape-b">
            ✦
        </div>

        <div class="floating-shape shape-c">
            ●
        </div>

    </div>

</section>



{{-- =========================================================
     BERITA
========================================================= --}}

<section class="section-news">


    <div class="container">


        {{-- SECTION HEADER --}}

        <div class="section-header">


            <div class="section-title-area">

                <span class="section-label">

                    <span></span>

                    BERITA TERBARU

                </span>


                <h2>
                    Kabar dari
                    <span>
                        TBM Bintang Raharja
                    </span>
                </h2>


                <p>

                    Informasi dan cerita seputar kegiatan,
                    program, kolaborasi, serta perkembangan
                    TBM Bintang Raharja.

                </p>

            </div>


            <div class="news-counter">

                <span>
                    NEWS
                </span>

                <strong>
                    {{ $news->count() }}
                </strong>

            </div>


        </div>



        {{-- =================================================
             JIKA ADA BERITA
        ================================================= --}}

        @if($news->count() > 0)


            <div class="news-grid">


                @foreach($news as $index => $item)


                    <article
                        class="news-card"
                        style="--delay: {{ $index * 100 }}ms;"
                    >


                        {{-- CARD GLOW --}}

                        <div class="card-glow"></div>


                        {{-- IMAGE --}}

                        <div class="news-image">


                            @if($item->image)

                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="image-placeholder">

                                    <div class="placeholder-icon">
                                        📰
                                    </div>

                                    <span>
                                        Belum ada gambar
                                    </span>

                                </div>

                            @endif


                            {{-- IMAGE OVERLAY --}}

                            <div class="image-overlay"></div>


                            {{-- CATEGORY --}}

                            @if($item->category)

                                <span class="news-category">

                                    {{ $item->category }}

                                </span>

                            @endif


                            {{-- NUMBER --}}

                            <span class="card-number">

                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                            </span>


                        </div>



                        {{-- CONTENT --}}

                        <div class="news-content">


                            {{-- DATE --}}

                            <div class="news-date">

                                <span class="date-icon">
                                    ●
                                </span>

                                {{ $item->published_at
                                    ? $item->published_at->translatedFormat('d F Y')
                                    : 'Belum dipublikasikan'
                                }}

                            </div>


                            {{-- TITLE --}}

                            <h3>

                                {{ $item->title }}

                            </h3>


                            {{-- DESCRIPTION --}}

                            <p>

                                {{ \Illuminate\Support\Str::limit(
                                    $item->excerpt ?? $item->content,
                                    145
                                ) }}

                            </p>


                            {{-- READ MORE --}}

                            <a
                                href="{{ route('news.show', $item) }}"
                                class="read-more"
                            >

                                <span>
                                    Baca Selengkapnya
                                </span>

                                <i>
                                    →
                                </i>

                            </a>


                        </div>


                    </article>


                @endforeach


            </div>


        @else


            {{-- =================================================
                 EMPTY STATE
            ================================================= --}}

            <div class="empty-state">


                <div class="empty-orb empty-orb-one"></div>
                <div class="empty-orb empty-orb-two"></div>


                <div class="empty-icon">

                    <div>
                        📰
                    </div>

                </div>


                <span class="empty-label">
                    INFORMASI
                </span>


                <h3>
                    Belum Ada Berita
                </h3>


                <p>

                    Belum ada berita yang dipublikasikan.
                    Nantikan informasi terbaru dari
                    TBM Bintang Raharja.

                </p>


                <a
                    href="{{ route('activities.index') }}"
                    class="empty-button"
                >

                    <span>
                        Lihat Kegiatan
                    </span>

                    <i>
                        →
                    </i>

                </a>


            </div>


        @endif


    </div>

</section>



{{-- =========================================================
     CTA
========================================================= --}}

<section class="cta-section">


    <div class="cta-glow cta-glow-one"></div>
    <div class="cta-glow cta-glow-two"></div>


    <div class="container cta-container">


        <span class="cta-label">
            TBM BINTANG RAHARJA
        </span>


        <h2>

            Literasi Hari Ini,

            <span>
                Masa Depan Nanti.
            </span>

        </h2>


        <p>

            Bersama membaca, belajar, dan berkarya
            untuk generasi yang lebih baik.

        </p>


        <a
            href="{{ route('activities.index') }}"
            class="cta-button"
        >

            <span>
                Lihat Kegiatan
            </span>

            <i>
                →
            </i>

        </a>


    </div>


</section>



{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="footer">


    <div class="container footer-container">


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
                    Membaca • Belajar • Berkarya • Bersama
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

        <div class="container">

            <p>
                © {{ date('Y') }}
                TBM Bintang Raharja.
                Semua hak dilindungi.
            </p>

        </div>

    </div>


</footer>



{{-- =========================================================
     JAVASCRIPT EFFECT
========================================================= --}}

<script>

document.addEventListener(
    "DOMContentLoaded",
    function () {


        /* =========================================
           CURSOR LIGHT
        ========================================= */

        const cursor =
            document.querySelector(".cursor-light");


        if (cursor) {

            document.addEventListener(
                "mousemove",
                function (e) {

                    cursor.style.left =
                        e.clientX + "px";

                    cursor.style.top =
                        e.clientY + "px";

                }
            );

        }



        /* =========================================
           CARD 3D
        ========================================= */

        const cards =
            document.querySelectorAll(".news-card");


        cards.forEach(
            function (card) {


                card.addEventListener(
                    "mousemove",
                    function (e) {


                        if (window.innerWidth < 800) {
                            return;
                        }


                        const rect =
                            card.getBoundingClientRect();


                        const x =
                            e.clientX - rect.left;


                        const y =
                            e.clientY - rect.top;


                        const centerX =
                            rect.width / 2;


                        const centerY =
                            rect.height / 2;


                        const rotateX =
                            ((y - centerY) /
                            centerY) * -3;


                        const rotateY =
                            ((x - centerX) /
                            centerX) * 3;


                        card.style.setProperty(
                            "--mouse-x",
                            x + "px"
                        );


                        card.style.setProperty(
                            "--mouse-y",
                            y + "px"
                        );


                        card.style.transform = `
                            translateY(-10px)
                            rotateX(${rotateX}deg)
                            rotateY(${rotateY}deg)
                        `;


                    }
                );


                card.addEventListener(
                    "mouseleave",
                    function () {

                        card.style.transform =
                            "";

                    }
                );


            }
        );



        /* =========================================
           SCROLL REVEAL
        ========================================= */

        const reveal =
            document.querySelectorAll(
                ".news-card, .section-header, .empty-state, .cta-container"
            );


        const observer =
            new IntersectionObserver(
                function (entries) {


                    entries.forEach(
                        function (entry) {

                            if (
                                entry.isIntersecting
                            ) {

                                entry.target.classList.add(
                                    "visible"
                                );

                                observer.unobserve(
                                    entry.target
                                );

                            }

                        }
                    );


                },
                {
                    threshold: .12
                }
            );


        reveal.forEach(
            function (element) {

                observer.observe(
                    element
                );

            }
        );



        /* =========================================
           IMAGE MOUSE PARALLAX
        ========================================= */

        const imageBoxes =
            document.querySelectorAll(
                ".news-image"
            );


        imageBoxes.forEach(
            function (box) {


                const image =
                    box.querySelector("img");


                if (!image) {
                    return;
                }


                box.addEventListener(
                    "mousemove",
                    function (e) {


                        if (window.innerWidth < 800) {
                            return;
                        }


                        const rect =
                            box.getBoundingClientRect();


                        const x =
                            (e.clientX -
                            rect.left) /
                            rect.width;


                        const y =
                            (e.clientY -
                            rect.top) /
                            rect.height;


                        const moveX =
                            (x - .5) * 12;


                        const moveY =
                            (y - .5) * 12;


                        image.style.transform = `
                            scale(1.10)
                            translate(
                                ${moveX}px,
                                ${moveY}px
                            )
                        `;


                    }
                );


                box.addEventListener(
                    "mouseleave",
                    function () {

                        image.style.transform =
                            "scale(1)";

                    }
                );


            }
        );


    }
);

</script>


</body>

</html>