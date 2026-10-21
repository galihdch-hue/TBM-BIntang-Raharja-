<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Galeri kegiatan TBM Bintang Raharja"
    >

    <title>
        Galeri - TBM Bintang Raharja
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/gallery.css') }}"
    >

</head>


<body>

    {{-- =====================================================
         BACKGROUND EFFECT
    ====================================================== --}}

    <div class="page-glow glow-one"></div>
    <div class="page-glow glow-two"></div>
    <div class="page-glow glow-three"></div>


    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

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

                <div class="logo-text">

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

                <a
                    href="{{ route('gallery.index') }}"
                    class="active"
                >
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
                <span>
                    Masuk
                </span>

                <span class="login-arrow">
                    →
                </span>

            </a>

        </div>

    </header>



    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="gallery-hero">

        <div class="hero-orb hero-orb-one"></div>
        <div class="hero-orb hero-orb-two"></div>
        <div class="hero-orb hero-orb-three"></div>

        <div class="hero-grid"></div>


        <div class="container hero-container">

            <div class="hero-copy reveal">

                <div class="hero-badge">

                    <span class="badge-dot"></span>

                    <span>
                        DOKUMENTASI KEGIATAN
                    </span>

                </div>


                <h1>

                    Cerita dalam
                    <span>
                        setiap momen.
                    </span>

                </h1>


                <p>

                    Lihat berbagai dokumentasi kegiatan,
                    pembelajaran, kreativitas, dan
                    kebersamaan di TBM Bintang Raharja.

                </p>


                <div class="hero-tags">

                    <span>
                        ✦ Kegiatan Literasi
                    </span>

                    <span>
                        ✦ Pembelajaran
                    </span>

                    <span>
                        ✦ Kreativitas
                    </span>

                </div>

            </div>


            {{-- HERO VISUAL --}}

            <div class="hero-visual reveal delay-one">

                <div class="visual-ring ring-one"></div>
                <div class="visual-ring ring-two"></div>

                <div class="visual-card">

                    <div class="visual-top">

                        <span>
                            TBM
                        </span>

                        <span>
                            GALERI
                        </span>

                    </div>


                    <div class="visual-camera">

                        <div class="camera-body">

                            <div class="camera-top"></div>

                            <div class="camera-lens">

                                <div class="lens-inner"></div>

                            </div>

                            <div class="camera-flash"></div>

                        </div>

                    </div>


                    <div class="visual-bottom">

                        <strong>
                            Momen Bersama
                        </strong>

                        <span>
                            Baca • Belajar • Berkarya
                        </span>

                    </div>

                </div>


                <div class="floating-card card-left">

                    <span class="floating-icon">
                        ✦
                    </span>

                    <div>
                        <strong>
                            Kreatif
                        </strong>

                        <small>
                            Bersama anak-anak
                        </small>
                    </div>

                </div>


                <div class="floating-card card-right">

                    <span class="floating-icon">
                        ✓
                    </span>

                    <div>
                        <strong>
                            Bersama
                        </strong>

                        <small>
                            Tumbuh setiap hari
                        </small>
                    </div>

                </div>

            </div>

        </div>


        <div class="hero-bottom-wave"></div>

    </section>



    {{-- =====================================================
         GALLERY
    ====================================================== --}}

    <main>

        <section class="gallery-section">

            <div class="container">

                <div class="section-heading reveal">

                    <div>

                        <span class="section-label">
                            GALERI KEGIATAN
                        </span>

                        <h2>
                            Momen Kegiatan
                        </h2>

                        <p>
                            Kumpulan dokumentasi kegiatan
                            dan aktivitas TBM Bintang Raharja.
                        </p>

                    </div>


                    @if($galleries->count() > 0)

                        <div class="gallery-count">

                            <span class="count-number">
                                {{ $galleries->count() }}
                            </span>

                            <span class="count-text">
                                Dokumentasi
                            </span>

                        </div>

                    @endif

                </div>



                @if($galleries->count() > 0)

                    <div class="gallery-grid">

                        @foreach($galleries as $index => $gallery)

                            <article
                                class="gallery-card reveal"
                                style="--card-delay: {{ min($index * 0.08, 0.5) }}s;"
                            >

                                <div
                                    class="gallery-image"
                                    onclick="openLightbox(
                                        '{{ addslashes($gallery->image) }}',
                                        '{{ addslashes($gallery->title) }}'
                                    )"
                                >

                                    <img
                                        src="{{ $gallery->image }}"
                                        alt="{{ $gallery->title }}"
                                        loading="lazy"
                                    >


                                    <div class="image-shine"></div>


                                    <div class="gallery-overlay">

                                        <div class="view-button">

                                            <span>
                                                +
                                            </span>

                                        </div>

                                        <strong>
                                            Lihat Foto
                                        </strong>

                                        <small>
                                            Klik untuk memperbesar
                                        </small>

                                    </div>

                                </div>



                                <div class="gallery-content">

                                    <span class="category">

                                        {{ $gallery->category }}

                                    </span>


                                    <h3>

                                        {{ $gallery->title }}

                                    </h3>


                                    @if($gallery->description)

                                        <p>

                                            {{ $gallery->description }}

                                        </p>

                                    @endif


                                    @if($gallery->date)

                                        <div class="gallery-meta">

                                            <span class="meta-icon">
                                                📅
                                            </span>

                                            <span>
                                                {{ $gallery->date->translatedFormat('d F Y') }}
                                            </span>

                                        </div>

                                    @endif


                                    <button
                                        type="button"
                                        class="card-action"
                                        onclick="openLightbox(
                                            '{{ addslashes($gallery->image) }}',
                                            '{{ addslashes($gallery->title) }}'
                                        )"
                                    >

                                        <span>
                                            Lihat Foto
                                        </span>

                                        <span class="action-arrow">
                                            →
                                        </span>

                                    </button>

                                </div>

                            </article>

                        @endforeach

                    </div>

                @else

                    <div class="empty-gallery reveal">

                        <div class="empty-icon">
                            📷
                        </div>

                        <h3>
                            Belum Ada Dokumentasi
                        </h3>

                        <p>
                            Dokumentasi kegiatan TBM Bintang Raharja
                            belum tersedia.
                        </p>

                    </div>

                @endif

            </div>

        </section>



        {{-- =================================================
             CTA
        ================================================== --}}

        <section class="gallery-cta">

            <div class="cta-glow cta-glow-one"></div>
            <div class="cta-glow cta-glow-two"></div>

            <div class="container">

                <div class="cta-box reveal">

                    <div class="cta-decoration decoration-one"></div>
                    <div class="cta-decoration decoration-two"></div>

                    <div class="cta-content">

                        <span class="cta-label">
                            TBM BINTANG RAHARJA
                        </span>

                        <h2>
                            Setiap kegiatan punya cerita.
                        </h2>

                        <p>
                            Yuk lihat berbagai kegiatan dan program
                            yang dilakukan bersama TBM Bintang Raharja.
                        </p>


                        <a
                            href="{{ route('activities.index') }}"
                            class="cta-button"
                        >

                            <span>
                                Lihat Kegiatan
                            </span>

                            <span>
                                →
                            </span>

                        </a>

                    </div>


                    <div class="cta-visual">

                        <div class="cta-circle circle-one"></div>
                        <div class="cta-circle circle-two"></div>
                        <div class="cta-circle circle-three"></div>

                        <div class="cta-book">

                            <div class="book-page page-left"></div>
                            <div class="book-page page-right"></div>

                            <span>
                                📖
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>



    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer class="footer">

        <div class="footer-glow footer-glow-one"></div>
        <div class="footer-glow footer-glow-two"></div>

        <div class="container">

            <div class="footer-main">


                {{-- BRAND --}}

                <div class="footer-brand">

                    <div class="footer-brand-top">

                        <div class="footer-logo-box">

                            <img
                                src="{{ asset('images/logoTBMfinal.png') }}"
                                alt="Logo TBM Bintang Raharja"
                            >

                        </div>

                        <div>

                            <h3>
                                TBM Bintang Raharja
                            </h3>

                            <p>
                                Membaca • Belajar • Berkarya • Bersama
                            </p>

                        </div>

                    </div>


                    <p class="footer-description">

                        Ruang belajar, membaca, dan berkarya
                        untuk masyarakat. Bersama membangun
                        lingkungan yang aktif, kreatif, dan
                        penuh inspirasi.

                    </p>

                </div>



                {{-- NAVIGATION --}}

                <div class="footer-column">

                    <span>
                        NAVIGASI
                    </span>

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



                {{-- LOCATION --}}

                <div class="footer-column">

                    <span>
                        KUNJUNGI KAMI
                    </span>

                    <strong>
                        TBM Bintang Raharja
                    </strong>

                    <p>
                        Desa Karangharja,
                        Cikarang Utara,
                        Kabupaten Bekasi.
                    </p>

                </div>

            </div>


            <div class="footer-bottom">

                <p>

                    © {{ date('Y') }}
                    <strong>
                        TBM Bintang Raharja
                    </strong>.
                    Semua hak dilindungi.

                </p>


                <div class="footer-status">

                    <span class="status-dot"></span>

                    <span>
                        Terus tumbuh bersama
                    </span>

                </div>

            </div>

        </div>

    </footer>



    {{-- =====================================================
         LIGHTBOX
    ====================================================== --}}

    <div
        class="lightbox"
        id="lightbox"
    >

        <div class="lightbox-backdrop"></div>


        <button
            type="button"
            class="lightbox-close"
            id="lightboxClose"
            aria-label="Tutup foto"
        >
            ×
        </button>


        <div class="lightbox-content">

            <div class="lightbox-image-wrap">

                <img
                    id="lightbox-image"
                    src=""
                    alt=""
                >

            </div>


            <div class="lightbox-caption">

                <span>
                    TBM BINTANG RAHARJA
                </span>

                <h3 id="lightbox-title"></h3>

            </div>

        </div>

    </div>



    {{-- =====================================================
         SCRIPT
    ====================================================== --}}

    <script>

        /* =====================================================
           REVEAL ANIMATION
        ===================================================== */

        const revealElements =
            document.querySelectorAll('.reveal');


        const revealObserver =
            new IntersectionObserver(
                (entries) => {

                    entries.forEach((entry) => {

                        if (entry.isIntersecting) {

                            const delay =
                                entry.target.style
                                    .getPropertyValue('--card-delay');

                            if (delay) {
                                entry.target.style.animationDelay = delay;
                            }

                            entry.target.classList.add('visible');

                            revealObserver.unobserve(
                                entry.target
                            );

                        }

                    });

                },
                {
                    threshold: 0.08
                }
            );


        revealElements.forEach((element) => {

            revealObserver.observe(element);

        });



        /* =====================================================
           LIGHTBOX
        ===================================================== */

        const lightbox =
            document.getElementById('lightbox');

        const lightboxImage =
            document.getElementById('lightbox-image');

        const lightboxTitle =
            document.getElementById('lightbox-title');

        const lightboxClose =
            document.getElementById('lightboxClose');

        const lightboxBackdrop =
            document.querySelector('.lightbox-backdrop');


        function openLightbox(image, title)
        {

            lightboxImage.src = image;

            lightboxImage.alt = title;

            lightboxTitle.textContent = title;

            lightbox.classList.add('show');

            document.body.classList.add('no-scroll');

        }


        function closeLightbox()
        {

            lightbox.classList.remove('show');

            document.body.classList.remove('no-scroll');

            setTimeout(() => {

                lightboxImage.src = '';

            }, 300);

        }


        lightboxClose.addEventListener(
            'click',
            closeLightbox
        );


        lightboxBackdrop.addEventListener(
            'click',
            closeLightbox
        );


        document.addEventListener(
            'keydown',
            function(event)
            {

                if (event.key === 'Escape') {

                    closeLightbox();

                }

            }
        );



        /* =====================================================
           MOUSE PARALLAX HERO
        ===================================================== */

        const hero =
            document.querySelector('.gallery-hero');

        const visual =
            document.querySelector('.hero-visual');


        if (hero && visual) {

            hero.addEventListener(
                'mousemove',
                function(event)
                {

                    const rect =
                        hero.getBoundingClientRect();

                    const x =
                        (event.clientX - rect.left)
                        / rect.width
                        - 0.5;

                    const y =
                        (event.clientY - rect.top)
                        / rect.height
                        - 0.5;


                    visual.style.transform =
                        `perspective(1000px)
                         rotateY(${x * 5}deg)
                         rotateX(${y * -5}deg)`;

                }
            );


            hero.addEventListener(
                'mouseleave',
                function()
                {

                    visual.style.transform =
                        '';

                }
            );

        }



        /* =====================================================
           IMAGE LOADING
        ===================================================== */

        document
            .querySelectorAll('.gallery-image img')
            .forEach((image) => {

                image.addEventListener(
                    'load',
                    function()
                    {

                        this.classList.add('loaded');

                    }
                );

            });

    </script>


</body>

</html>