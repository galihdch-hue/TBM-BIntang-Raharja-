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
    <link rel="stylesheet" href="{{ asset('css/site-navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/site-footer.css') }}">

</head>


<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

@include('partials.site-navbar')



{{-- =====================================================
     HERO
===================================================== --}}

<section class="about-hero">

    <div class="container">

        <span class="hero-label">
            {{ $about['hero']['eyebrow'] }}
        </span>

        <h1>
            {{ $about['hero']['title'] }}
            <span>
                {{ $about['hero']['name'] }}
            </span>
        </h1>

        <p>
            {{ $about['hero']['description'] }}
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
                    src="{{ $about['image_urls']['logo'] }}"
                    alt="TBM Bintang Raharja"
                >

            </div>

        </div>


        {{-- TEKS DI KANAN --}}

        <div class="about-text">

            <span class="section-label">
                {{ $about['overview']['label'] }}
            </span>

            <h2>
                {{ $about['overview']['title_prefix'] }}
                <span>
                    {{ $about['overview']['title_highlight'] }}
                </span>
            </h2>

            @foreach ($about['overview']['paragraphs'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach

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
                {{ $about['biography']['section_title'] }}
            </span>

            <h2>
                {{ $about['biography']['name'] }}
            </h2>

            <p>
                {{ $about['biography']['summary'] }}
            </p>

        </div>


        <div class="biography-card">


            {{-- FOTO SEBELAH KIRI --}}

            <div class="biography-photo">

                <div class="photo-frame">

                    <img
                        src="{{ $about['image_urls']['biography'] }}"
                        alt="{{ $about['biography']['person_name'] }}"
                    >

                </div>


                <div class="photo-caption">

                    <strong>
                        {{ $about['biography']['person_name'] }}
                    </strong>

                    <span>
                        {{ $about['biography']['role'] }}
                    </span>

                </div>

            </div>



            {{-- TEKS SEBELAH KANAN --}}

            <div class="biography-content">

                <span class="biography-label">
                    {{ $about['biography']['label'] }}
                </span>

                <h3>
                    {{ $about['biography']['title'] }}
                </h3>

                @foreach ($about['biography']['paragraphs'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach


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
                            {{ $about['biography']['highlight_title'] }}
                        </strong>

                        <p>
                            {{ $about['biography']['highlight_content'] }}
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
                {{ $about['vision']['title'] }}
            </h2>

            <p>
                {{ $about['vision']['content'] }}
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
                {{ $about['mission']['title'] }}
            </h2>

            <p>
                @foreach ($about['mission']['items'] as $mission)
                    {{ $loop->iteration }}. {{ $mission }}@if (! $loop->last)<br><br>@endif
                @endforeach
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
                {{ $about['history']['title'] }}
            </h2>

            <p>
                {{ $about['history']['description'] }}
            </p>

        </div>


        <div class="timeline">

            @foreach ($about['history']['items'] as $item)

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
                {{ $about['values']['title'] }}
            </h2>

            <p>
                {{ $about['values']['description'] }}
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

            @foreach ($about['values']['items'] as $index => $value)

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
            {{ $about['cta']['title'] }}
        </h2>

        <p>
            {{ $about['cta']['description'] }}
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

@include('partials.site-footer')



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