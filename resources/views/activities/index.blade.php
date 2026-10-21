<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Kegiatan - TBM Bintang Raharja
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
     TETAP
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
                class="{{ request()->routeIs('activities.*') ? 'active' : '' }}"
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
     HERO
========================================================= --}}

<section class="activities-hero">

    <div class="hero-orb orb-one"></div>
    <div class="hero-orb orb-two"></div>
    <div class="hero-orb orb-three"></div>

    <div class="hero-grid"></div>

    <div class="hero-particles">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>


    <div class="hero-container">

        <div class="hero-content">

            <span class="hero-badge">

                <i></i>

                <span>
                    Kegiatan TBM
                </span>

            </span>


            <h1>

                Kegiatan &

                <span>
                    Program Belajar
                </span>

            </h1>


            <p>
                Temukan berbagai kegiatan literasi,
                pembelajaran, kreativitas, dan
                pengembangan keterampilan yang
                diselenggarakan oleh TBM Bintang Raharja.
            </p>


            <div class="hero-line">
                <span></span>
            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     KEGIATAN
========================================================= --}}

<main class="activities-section">

    <div class="section-bg-orb section-bg-one"></div>
    <div class="section-bg-orb section-bg-two"></div>

    <div class="activities-container">


        {{-- HEADER --}}

        <div class="section-header reveal">

            <div>

                <span class="section-label">
                    PROGRAM TBM
                </span>

                <h2>
                    Kegiatan Terbaru
                </h2>

                <p>
                    Lihat kegiatan yang sedang dan akan
                    dilaksanakan di TBM Bintang Raharja.
                </p>

            </div>

        </div>


        {{-- FILTER --}}

        @if($activities->count() > 0)

            <div class="activity-filter reveal">

                <button
                    type="button"
                    class="filter-button active"
                    data-filter="all"
                >
                    Semua
                </button>


                @foreach(
                    $activities
                    ->pluck('category')
                    ->filter()
                    ->unique()
                    as $category
                )

                    <button
                        type="button"
                        class="filter-button"
                        data-filter="{{ \Illuminate\Support\Str::slug($category) }}"
                    >
                        {{ $category }}
                    </button>

                @endforeach

            </div>

        @endif


        {{-- GRID --}}

        @if($activities->count() > 0)

            <div class="activities-grid">

                @foreach($activities as $index => $activity)

                    <article
                        class="activity-card reveal"
                        data-category="{{ \Illuminate\Support\Str::slug($activity->category ?? 'lainnya') }}"
                        style="--delay: {{ $index * 90 }}ms;"
                    >

                        {{-- IMAGE --}}

                        <div class="activity-image">

                            @if($activity->image)

                                <img
                                    src="{{ asset('storage/' . $activity->image) }}"
                                    alt="{{ $activity->title }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="default-image">

                                    <div>
    <img
        src="{{ asset('images/icon-kegiatan.png') }}"
        alt="Kegiatan TBM"
        style="width: 70px; height: 70px; object-fit: contain;"
    >
</div>

                                    <strong>
                                        TBM Bintang Raharja
                                    </strong>

                                    <small>
                                        Kegiatan & Program
                                    </small>

                                </div>

                            @endif


                            {{-- IMAGE OVERLAY --}}

                            <div class="image-gradient"></div>

                            <div class="image-shine"></div>


                            {{-- CATEGORY --}}

                            <span class="activity-category">

                                <span class="category-dot"></span>

                                {{ $activity->category ?? 'Program TBM' }}

                            </span>


                            {{-- NUMBER --}}

                            <span class="activity-number">

                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                            </span>


                            {{-- IMAGE ARROW --}}

                            <span class="image-arrow">
                                ↗
                            </span>

                        </div>


                        {{-- CONTENT --}}

                        <div class="activity-content">


                            <div class="activity-date">

                                <div class="meta-icon meta-green">
    <img
        src="{{ asset('images/calendar.png') }}"
        alt="Tanggal"
        style="width: 22px; height: 22px; object-fit: contain;"
    >
</div>

                                <span>

                                    {{ $activity->date->translatedFormat('l, d F Y') }}

                                </span>

                            </div>


                            <h3>
                                {{ $activity->title }}
                            </h3>


                            <p class="activity-description">

                                {{ \Illuminate\Support\Str::limit(
                                    $activity->description
                                    ?? 'Kegiatan pembelajaran TBM Bintang Raharja.',
                                    120
                                ) }}

                            </p>


                            {{-- INFO --}}

                            <div class="activity-info">


                                <div class="info-item">

                                    <div class="meta-icon meta-blue">
    <img
        src="{{ asset('images/jam.png') }}"
        alt="Waktu"
        style="width: 22px; height: 22px; object-fit: contain;"
    >
</div>

                                    <div>

                                        <small>
                                            Waktu
                                        </small>

                                        <span>

                                            {{ \Carbon\Carbon::parse($activity->start_time)->format('H:i') }}

                                            -

                                            {{ \Carbon\Carbon::parse($activity->end_time)->format('H:i') }}

                                        </span>

                                    </div>

                                </div>


                                @if($activity->location)

                                    <div class="info-item">

                                        <div class="meta-icon meta-purple">
    <img
        src="{{ asset('images/lokasi.png') }}"
        alt="Lokasi"
        style="width: 22px; height: 22px; object-fit: contain;"
    >
</div>

                                        <div>

                                            <small>
                                                Lokasi
                                            </small>

                                            <span>
                                                {{ $activity->location }}
                                            </span>

                                        </div>

                                    </div>

                                @endif


                            </div>


{{-- INSTRUCTOR --}}
@if($activity->instructor)

    @php
        $instructorImages = [
            'Kak Rina' => 'images/galih.jpeg',
            'Galih' => 'images/galih.jpeg',

            'Kak Siti' => 'images/kak-siti.jpg',
            'Siti' => 'images/kak-siti.jpg',

            'Kak Dimas' => 'images/kak-dimas.jpg',
            'Dimas' => 'images/kak-dimas.jpg',
        ];

        $instructorImage = $instructorImages[$activity->instructor] ?? null;

        // Nama yang ditampilkan
        $instructorName = match ($activity->instructor) {
            'Kak Rina' => 'Ka Nugan',
            'Rina' => 'Galih',

            'Kak Siti' => 'Ka Ashila',
            'Siti' => 'Siti',

            'Kak Dimas' => 'Ka Agung',
            'Dimas' => 'Dimas',

            default => $activity->instructor,
        };
    @endphp

    <div class="instructor">

        <div class="instructor-avatar">

            @if($instructorImage && file_exists(public_path($instructorImage)))

                <img
                    src="{{ asset($instructorImage) }}"
                    alt="{{ $instructorName }}"
                >

            @else

                <span>
                    {{ strtoupper(substr($instructorName, 0, 1)) }}
                </span>

            @endif

        </div>

        <div>
            <small>Pengajar</small>

            <strong>
                {{ $instructorName }}
            </strong>
        </div>

    </div>

@endif


                            {{-- BUTTON --}}

                            <a href="{{ route('activities.show', $activity->id) }}" class="detail-button">
    Lihat Detail
    <span>→</span>
</a>
                                <b>
                                    →
                                </b>

                            </a>

                        </div>

                    </article>

                @endforeach

            </div>


        @else

            {{-- EMPTY STATE --}}

            <div class="empty-state reveal">

                <div class="empty-icon">
                    📚
                </div>

                <span class="empty-label">
                    PROGRAM TBM
                </span>

                <h3>
                    Belum Ada Kegiatan
                </h3>

                <p>
                    Saat ini belum ada kegiatan yang tersedia.
                    Silakan cek kembali nanti.
                </p>

            </div>

        @endif

    </div>

</main>


{{-- =========================================================
     CTA
========================================================= --}}

<section class="activities-cta">

    <div class="cta-bg-orb cta-orb-one"></div>
    <div class="cta-bg-orb cta-orb-two"></div>

    <div class="cta-container reveal">


        <div class="cta-content">

            <span class="cta-icon">
                🌱
            </span>


            <div>

                <span class="cta-label">
                    TUMBUH BERSAMA
                </span>

                <h2>
                    Ingin Mengenal TBM Bintang Raharja?
                </h2>

                <p>
                    Kenali lebih jauh tentang sejarah,
                    visi, dan kegiatan TBM Bintang Raharja.
                </p>

            </div>

        </div>


        <a
            href="{{ route('about') }}"
            class="cta-button"
        >

            <span>
                Tentang TBM
            </span>

            <b>
                →
            </b>

        </a>

    </div>

</section>


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

    /* =====================================================
       SCROLL PROGRESS
    ===================================================== */

    const progress = document.createElement('div');

    progress.className = 'page-progress';

    document.body.appendChild(progress);


    const updateProgress = () => {

        const scrollTop =
            window.scrollY ||
            document.documentElement.scrollTop;

        const maxScroll =
            document.documentElement.scrollHeight -
            window.innerHeight;

        const percent =
            maxScroll > 0
                ? (scrollTop / maxScroll) * 100
                : 0;

        progress.style.width =
            `${Math.min(100, Math.max(0, percent))}%`;

    };


    updateProgress();

    window.addEventListener(
        'scroll',
        updateProgress,
        { passive: true }
    );


    /* =====================================================
       POINTER GLOW
    ===================================================== */

    const pointerGlow =
        document.createElement('div');

    pointerGlow.className =
        'pointer-glow';

    document.body.appendChild(pointerGlow);


    let mouseX = -500;
    let mouseY = -500;

    let targetX = -500;
    let targetY = -500;


    const animateGlow = () => {

        mouseX +=
            (targetX - mouseX) * .1;

        mouseY +=
            (targetY - mouseY) * .1;


        pointerGlow.style.transform =
            `translate3d(${mouseX}px, ${mouseY}px, 0)`;


        requestAnimationFrame(
            animateGlow
        );

    };


    animateGlow();


    window.addEventListener(
        'pointermove',
        event => {

            targetX =
                event.clientX;

            targetY =
                event.clientY;

            pointerGlow.style.opacity =
                '1';

        },
        { passive: true }
    );


    /* =====================================================
       FILTER
    ===================================================== */

    const filterButtons =
        document.querySelectorAll(
            '.filter-button'
        );

    const activityCards =
        document.querySelectorAll(
            '.activity-card'
        );


    filterButtons.forEach(button => {

        button.addEventListener(
            'click',
            () => {

                filterButtons.forEach(btn => {

                    btn.classList.remove(
                        'active'
                    );

                });


                button.classList.add(
                    'active'
                );


                const filter =
                    button.dataset.filter;


                activityCards.forEach(card => {

                    const category =
                        card.dataset.category;


                    if (
                        filter === 'all' ||
                        category === filter
                    ) {

                        card.classList.remove(
                            'is-hidden'
                        );

                    } else {

                        card.classList.add(
                            'is-hidden'
                        );

                    }

                });

            }
        );

    });


    /* =====================================================
       CARD 3D EFFECT
    ===================================================== */

    activityCards.forEach(card => {

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
                    ((x / rect.width) - .5) * 5;


                const rotateX =
                    ((y / rect.height) - .5) * -5;


                card.style.transform =
                    `
                    translateY(-12px)
                    perspective(1100px)
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg)
                    `;


                card.style.setProperty(
                    '--mouse-x',
                    `${x}px`
                );


                card.style.setProperty(
                    '--mouse-y',
                    `${y}px`
                );

            }
        );


        card.addEventListener(
            'pointerleave',
            () => {

                card.style.transform =
                    '';

            }
        );

    });


    /* =====================================================
       REVEAL
    ===================================================== */

    const revealElements =
        document.querySelectorAll(
            '.reveal'
        );


    if (
        'IntersectionObserver'
        in window
    ) {

        const observer =
            new IntersectionObserver(
                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                !entry.isIntersecting
                            ) {
                                return;
                            }


                            entry.target.classList.add(
                                'visible'
                            );


                            observer.unobserve(
                                entry.target
                            );

                        }
                    );

                },
                {
                    threshold: .08,
                    rootMargin:
                        '0px 0px -50px 0px'
                }
            );


        revealElements.forEach(
            element => {

                observer.observe(
                    element
                );

            }
        );

    } else {

        revealElements.forEach(
            element => {

                element.classList.add(
                    'visible'
                );

            }
        );

    }

});

</script>

</body>
</html>