<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $home['hero']['title'] }} {{ $home['hero']['highlight'] }} - TBM Bintang Raharja</title>

    <meta
        name="description"
        content="{{ $home['hero']['description'] }}"
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
    <link rel="stylesheet" href="{{ asset('css/site-navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/site-footer.css') }}">
</head>


<body>

<div
    class="cursor-glow"
    aria-hidden="true"
></div>


{{-- =========================================================
     NAVBAR
========================================================= --}}

@include('partials.site-navbar')



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

                {{ $home['hero']['label'] }}

            </span>


            <h1>
                {{ $home['hero']['title'] }}
                <span>{{ $home['hero']['highlight'] }}</span>
            </h1>


            <p>

                {{ $home['hero']['description'] }}

            </p>


            <div class="hero-buttons">

                <a
                    href="#kegiatan"
                    class="button primary"
                >

                    {{ $home['hero']['primary_label'] }}

                    <span>
                        →
                    </span>

                </a>


                <a
                    href="{{ route('about') }}"
                    class="button secondary"
                >

                    {{ $home['hero']['secondary_label'] }}

                </a>

            </div>



            {{-- HERO MINI INFORMATION --}}

            <div class="hero-mini-info">
                @foreach ($home['hero']['focus'] as $index => $focus)
                    @if ($index > 0)
                        <div class="mini-info-divider"></div>
                    @endif
                    <div class="mini-info-item">
                        <div class="activity-placeholder">
                            <img src="{{ asset('images/'.$focus['icon']) }}" alt="">
                        </div>
                        <div>
                            <span>{{ $focus['label'] }}</span>
                            <b>{{ $focus['value'] }}</b>
                        </div>
                    </div>
                @endforeach
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
                    src="{{ $home['image_urls']['hero'] }}"
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

            @foreach ($home['stats'] as $index => $stat)

                <div
                    class="stat-card reveal"
                    data-delay="{{ $index * 100 }}"
                >

                    <div class="stat-icon">

                        <img
                            src="{{ asset('images/'.$stat['icon']) }}"
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
                    {{ $home['intro']['label'] }}
                </span>

                <div class="intro-line"></div>

            </div>


            <div
                class="intro-content reveal"
                data-delay="100"
            >

                <h2>
                    {{ $home['intro']['title'] }}
                    <span>{{ $home['intro']['highlight'] }}</span>
                </h2>


                <p>

                    {{ $home['intro']['description'] }}

                </p>


                <a
                    href="{{ route('about') }}"
                    class="text-link"
                >

                    {{ $home['intro']['link_label'] }}

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
                    {{ $home['activities']['label'] }}
                </span>


                <h2>
                    {{ $home['activities']['title'] }}
                    <span>{{ $home['activities']['highlight'] }}</span>
                </h2>


                <p>

                    {{ $home['activities']['description'] }}

                </p>

            </div>


            <a
                href="{{ route('activities.index') }}"
                class="see-all"
            >
                {{ $home['activities']['link_label'] }} →
            </a>

        </div>



        <div class="activity-grid">

            @forelse ($activities as $index => $activity)

                <article
                    class="activity-card reveal"
                    data-delay="{{ $index * 100 }}"
                >

                    <div class="activity-image">

                        @if ($activity->image)

                            <img
                                src="{{ \Illuminate\Support\Str::startsWith($activity->image, ['http://', 'https://']) ? $activity->image : asset('storage/' . $activity->image) }}"
                                alt="{{ $activity->title }}"
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
                                {{ $activity->category }}
                            </span>

                        </div>

                    </div>



                    <div class="activity-content">

                        <span class="category">
                            {{ $activity->category }}
                        </span>


                        <h3>
                            {{ $activity->title }}
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

                                {{ $activity->date->translatedFormat('l, d F Y') }}

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

                                {{ \Carbon\Carbon::parse($activity->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($activity->end_time)->format('H:i') }}

                            </span>

                        </div>



                        <a
                            href="{{ route('activities.show', $activity) }}"
                            class="activity-link"
                        >

                            Lihat Detail

                            <span>
                                →
                            </span>

                        </a>

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">

                        <img
                            src="{{ asset('images/books.png') }}"
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
                    src="{{ $home['image_urls']['about'] }}"
                    alt="Kegiatan TBM Bintang Raharja"
                >

            </div>

        </div>



        {{-- CONTENT --}}

        <div
            class="about-content reveal"
            data-delay="150"
        >

            <span class="section-label">{{ $home['about']['label'] }}</span>


            <h2>
                {{ $home['about']['title'] }}
                <span>{{ $home['about']['highlight'] }}</span>

            </h2>


            @foreach ($home['about']['paragraphs'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach

            <div class="about-points">
                @foreach ($home['about']['points'] as $index => $point)
                    <div class="about-point">
                        <span>
                            <img
                                src="{{ asset('images/'.($home['about']['point_icons'][$index] ?? 'book.png')) }}"
                                alt=""
                                style="width:18px;height:18px;object-fit:contain;"
                            >
                        </span>
                        <p>{{ $point }}</p>
                    </div>
                @endforeach
            </div>


            <a
                href="{{ route('about') }}"
                class="button primary"
            >

                {{ $home['about']['link_label'] }}

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

            <span class="section-label">{{ $home['history']['label'] }}</span>

            <h2>
                {{ $home['history']['title'] }}
                <span>{{ $home['history']['highlight'] }}</span>
            </h2>

            <p>{{ $home['history']['description'] }}</p>

        </div>



        <div class="history-timeline">
            @foreach ($home['history']['items'] as $index => $item)
                <div class="history-item reveal" data-delay="{{ $index * 100 }}">
                    <div class="history-marker">
                        <span>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="history-content">
                        <span class="history-year">{{ $item['year'] }}</span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                    </div>
                </div>
            @endforeach
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

            <span class="section-label">{{ $home['values']['label'] }}</span>
            <h2>{{ $home['values']['title'] }}</h2>
            <p>{{ $home['values']['description'] }}</p>

        </div>



        <div class="values-grid">
            @foreach ($home['values']['items'] as $index => $value)
                <div class="value-card reveal" data-delay="{{ $index * 100 }}">
                    <div class="value-icon">
                        <img src="{{ asset('images/'.$value['icon']) }}" alt="" style="width:65%;height:65%;object-fit:contain;">
                    </div>
                    <span class="value-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <h3>{{ $value['title'] }}</h3>
                    <p>{{ $value['description'] }}</p>
                </div>
            @endforeach
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

                <span class="section-label">{{ $home['impact']['label'] }}</span>


                <h2>

                    {{ $home['impact']['title'] }}
                    <span>
                        {{ $home['impact']['highlight'] }}
                    </span>
                    {{ $home['impact']['title_suffix'] }}

                </h2>


                <p>

                    {{ $home['impact']['description'] }}

                </p>

            </div>



            <div class="build-list">
                @foreach ($home['impact']['items'] as $index => $item)
                    <div class="build-item reveal" data-delay="{{ $index * 100 }}">
                        <span class="build-icon">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <div>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </div>
                @endforeach
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

            <span class="section-label">{{ $home['milestones']['label'] }}</span>


            <h2>
                {{ $home['milestones']['title'] }}
                <span>{{ $home['milestones']['highlight'] }}</span>
            </h2>


            <p>

                {{ $home['milestones']['description'] }}

            </p>

        </div>



        <div class="milestone-grid">
            @foreach ($home['milestones']['items'] as $index => $item)
                <div class="milestone-card reveal" data-delay="{{ $index * 100 }}">
                    <span class="milestone-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <div>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section>



{{-- =========================================================
     KOLABORASI
========================================================= --}}

@if (! empty($home['partners']['items']))
<section class="section partners-section">

    <div class="container">


        <div
            class="section-header center reveal"
        >

            <span class="section-label">{{ $home['partners']['label'] }}</span>
            <h2>{{ $home['partners']['title'] }}</h2>
            <p>{{ $home['partners']['description'] }}</p>

        </div>



        <div class="partners-grid">
            @foreach ($home['partners']['items'] as $index => $partner)
                <div class="partner-card reveal" data-delay="{{ $index * 100 }}">
                    <div class="partner-icon">
                        @if (! empty($partner['icon_url']))
                            <img src="{{ $partner['icon_url'] }}" alt="Logo {{ $partner['name'] }}" loading="lazy">
                        @else
                            <span aria-hidden="true">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($partner['name'], 0, 1)) }}</span>
                        @endif
                    </div>
                    <strong>{{ $partner['name'] }}</strong>
                    <span>Partner &amp; Kolaborator</span>
                </div>
            @endforeach
        </div>

</section>
@endif



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

            {{ $home['cta']['eyebrow'] }}

        </span>


        <h2>

            {{ $home['cta']['title_first'] }}
            {{ $home['cta']['title_second'] }}
            <br>
            {{ $home['cta']['title_third'] }}

        </h2>


        <p>

            {{ $home['cta']['description'] }}

        </p>


        <div class="cta-buttons">

            <a
                href="{{ route('activities.index') }}"
                class="button primary"
            >

                {{ $home['cta']['activities_label'] }}

                <span>
                    →
                </span>

            </a>


            <a
                href="{{ route('contact.index') }}"
                class="button secondary"
            >

                {{ $home['cta']['contact_label'] }}

            </a>

        </div>

    </div>

</section>



{{-- =========================================================
     FOOTER
========================================================= --}}

@include('partials.site-footer')



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