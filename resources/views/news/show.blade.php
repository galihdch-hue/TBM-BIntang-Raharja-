<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $news->title }} - TBM Bintang Raharja
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/news.css') }}"
    >

</head>


<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

<header class="navbar">

    <div class="navbar-container">

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


        <a
            href="{{ route('login') }}"
            class="login-button"
        >
            Masuk
        </a>

    </div>

</header>



{{-- =========================================================
     DETAIL BERITA
========================================================= --}}

<main class="detail-section news-detail-page">

    {{-- BACKGROUND DECORATION --}}

    <div class="detail-orb detail-orb-one"></div>
    <div class="detail-orb detail-orb-two"></div>
    <div class="detail-orb detail-orb-three"></div>


    <div class="detail-container">


        {{-- BACK BUTTON --}}

        <a
            href="{{ route('news.index') }}"
            class="back-button news-back-button"
        >

            <span class="back-arrow">
                ←
            </span>

            <span>
                Kembali ke Berita
            </span>

        </a>



        {{-- ARTICLE CARD --}}

        <article class="article-card news-article-card">


            {{-- IMAGE --}}

            <div class="article-image news-article-image">

                @if($news->image)

                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="{{ $news->title }}"
                    >

                    <div class="image-overlay"></div>

                    <div class="image-floating-badge">

                        <span>
                            📰
                        </span>

                        Berita TBM

                    </div>

                @else

                    <div class="article-placeholder">

                        <span>
                            📰
                        </span>

                    </div>

                @endif

            </div>



            {{-- ARTICLE CONTENT --}}

            <div class="article-content">


                {{-- CATEGORY --}}

                <div class="article-topline">

                    <span class="article-category">

                        {{ $news->category }}

                    </span>

                    <span class="article-reading">

                        📖 Berita TBM

                    </span>

                </div>



                {{-- TITLE --}}

                <h1>
                    {{ $news->title }}
                </h1>



                {{-- META --}}

                <div class="article-meta">

                    <span>

                        <span class="meta-icon">
                            📅
                        </span>

                        {{ $news->published_at
                            ? $news->published_at->translatedFormat('d F Y')
                            : '-' }}

                    </span>


                    @if($news->author)

                        <span>

                            <span class="meta-icon">
                                👤
                            </span>

                            {{ $news->author }}

                        </span>

                    @endif

                </div>



                {{-- DIVIDER --}}

                <div class="article-divider"></div>



                {{-- ARTICLE BODY --}}

                <div class="article-body">


                    {{-- EXCERPT --}}

                    @if($news->excerpt)

                        <div class="article-excerpt">

                            <span class="excerpt-icon">
                                “
                            </span>

                            <div>

                                {{ $news->excerpt }}

                            </div>

                        </div>

                    @endif



                    {{-- CONTENT --}}

                    <div class="article-content-text">

                        {!! nl2br(e($news->content)) !!}

                    </div>


                </div>



                {{-- ARTICLE END --}}

                <div class="article-end">

                    <span></span>

                    <div class="article-end-icon">
                        ✦
                    </div>

                    <span></span>

                </div>


            </div>

        </article>



        {{-- ARTICLE BOTTOM --}}

        <div class="article-bottom news-article-bottom">


            <div class="bottom-text">

                <div class="bottom-icon">
                    📚
                </div>

                <div>

                    <strong>
                        Ingin membaca berita lainnya?
                    </strong>

                    <span>
                        Temukan kabar dan informasi terbaru
                        dari TBM Bintang Raharja.
                    </span>

                </div>

            </div>


            <a
                href="{{ route('news.index') }}"
                class="detail-button news-detail-button"
            >

                <span>
                    Kembali ke Berita
                </span>

                <span class="button-arrow">
                    →
                </span>

            </a>

        </div>



        {{-- RELATED CTA --}}

        <section class="news-detail-cta">

            <div class="cta-decoration cta-decoration-one"></div>
            <div class="cta-decoration cta-decoration-two"></div>


            <div class="news-detail-cta-content">

                <span class="news-detail-cta-label">
                    TBM BINTANG RAHARJA
                </span>

                <h2>
                    Membaca Hari Ini,
                    <span>
                        Menginspirasi Esok Hari.
                    </span>
                </h2>

                <p>
                    Ikuti berbagai kegiatan, berita,
                    dan cerita inspiratif dari TBM
                    Bintang Raharja.
                </p>


                <div class="news-detail-cta-actions">

                    <a
                        href="{{ route('news.index') }}"
                        class="cta-main-button"
                    >

                        Lihat Semua Berita

                        <span>
                            →
                        </span>

                    </a>


                    <a
                        href="{{ route('activities.index') }}"
                        class="cta-outline-button"
                    >

                        Lihat Kegiatan

                    </a>

                </div>

            </div>

        </section>


    </div>

</main>



{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="footer">

    <div class="container">

        <div class="footer-content">


            <div>

                <h3>
                    ⭐ TBM Bintang Raharja
                </h3>

                <p>
                    Membaca • Belajar • Berkarya • Bersama
                </p>

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

            </div>


        </div>

    </div>

</footer>



{{-- =========================================================
     ANIMATION SCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', () => {

    const elements = [
        '.news-back-button',
        '.news-article-card',
        '.news-article-bottom',
        '.news-detail-cta'
    ];

    elements.forEach((selector, index) => {

        const element = document.querySelector(selector);

        if (!element) return;

        element.style.animationDelay = `${index * 0.12}s`;

    });


    /* IMAGE PARALLAX */

    const image = document.querySelector('.news-article-image img');

    if (image) {

        window.addEventListener('scroll', () => {

            const rect = image.getBoundingClientRect();

            const windowHeight = window.innerHeight;

            if (
                rect.top < windowHeight &&
                rect.bottom > 0
            ) {

                const progress =
                    (windowHeight - rect.top) /
                    (windowHeight + rect.height);

                const movement =
                    (progress - 0.5) * 16;

                image.style.transform =
                    `scale(1.04) translateY(${movement}px)`;

            }

        });

    }


    /* BUTTON MAGNETIC EFFECT */

    document
        .querySelectorAll('.news-detail-button, .cta-main-button')
        .forEach(button => {

            button.addEventListener('mousemove', e => {

                const rect =
                    button.getBoundingClientRect();

                const x =
                    e.clientX - rect.left - rect.width / 2;

                const y =
                    e.clientY - rect.top - rect.height / 2;

                button.style.transform =
                    `translate(${x * 0.08}px, ${y * 0.08}px)`;

            });

            button.addEventListener('mouseleave', () => {

                button.style.transform =
                    '';

            });

        });

});

</script>


</body>

</html>