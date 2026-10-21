<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Jadwal Kegiatan - TBM Bintang Raharja
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/peserta-dashboard.css') }}"
    >

    <style>

        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
            margin-bottom: 24px;
        }

        .page-header span {
            display: block;

            color: var(--green);

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .7px;

            margin-bottom: 5px;
        }

        .page-header h2 {
            font-size: 25px;

            margin-bottom: 7px;
        }

        .page-header p {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.7;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 17px;

            margin-bottom: 20px;
        }

        .filter-form {
            display: flex;

            align-items: flex-end;

            gap: 12px;

            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;

            min-width: 180px;
        }

        .filter-group label {
            display: block;

            font-size: 9px;

            font-weight: 700;

            color: #475467;

            margin-bottom: 6px;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;

            height: 40px;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 0 11px;

            background: white;

            color: var(--text);

            font-family: inherit;

            font-size: 10px;

            outline: none;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            border-color: var(--green);
        }

        .filter-button {
            height: 40px;

            border: 0;

            border-radius: 8px;

            background: var(--green);

            color: white;

            padding: 0 17px;

            font-family: inherit;

            font-size: 10px;

            font-weight: 700;

            cursor: pointer;
        }

        .filter-button:hover {
            background: var(--green-dark);
        }

        .reset-button {
            height: 40px;

            display: flex;

            align-items: center;

            padding: 0 13px;

            border-radius: 8px;

            background: #f4f6f5;

            color: #667085;

            font-size: 10px;

            font-weight: 600;
        }

        .reset-button:hover {
            background: var(--green-light);

            color: var(--green);
        }


        /* =====================================================
           SCHEDULE
        ===================================================== */

        .schedule-wrapper {
            display: flex;

            flex-direction: column;

            gap: 15px;
        }


        .schedule-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 17px;

            transition: .2s;
        }


        .schedule-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 30px rgba(16,42,67,.06);
        }


        /* DATE */

        .schedule-date {
            width: 70px;

            min-height: 78px;

            border-radius: 12px;

            background: var(--green-light);

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            text-align: center;
        }


        .schedule-date .day {
            display: block;

            color: var(--green);

            font-size: 25px;

            font-weight: 800;

            line-height: 1;
        }


        .schedule-date .month {
            display: block;

            margin-top: 5px;

            color: var(--green-dark);

            font-size: 9px;

            font-weight: 700;

            text-transform: uppercase;
        }


        .schedule-date .year {
            display: block;

            margin-top: 2px;

            color: var(--muted);

            font-size: 7px;
        }


        /* INFO */

        .schedule-main {
            flex: 1;

            min-width: 0;
        }


        .schedule-top {
            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 7px;
        }


        .schedule-category {
            display: inline-block;

            background: var(--green-light);

            color: var(--green-dark);

            padding: 5px 8px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 700;
        }


        .schedule-main h3 {
            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 7px;
        }


        .schedule-description {
            color: var(--muted);

            font-size: 9px;

            line-height: 1.6;

            margin-bottom: 10px;
        }


        .schedule-meta {
            display: flex;

            align-items: center;

            flex-wrap: wrap;

            gap: 12px;
        }


        .schedule-meta span {
            color: #667085;

            font-size: 9px;
        }


        /* ACTION */

        .schedule-action {
            flex-shrink: 0;
        }


        .detail-button {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 9px 13px;

            border-radius: 8px;

            background: var(--green);

            color: white;

            font-size: 9px;

            font-weight: 700;
        }


        .detail-button:hover {
            background: var(--green-dark);
        }


        /* EMPTY */

        .empty-schedule {
            background: white;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 65px 20px;

            text-align: center;
        }


        .empty-schedule-icon {
            width: 60px;

            height: 60px;

            margin: 0 auto 13px;

            border-radius: 50%;

            background: var(--green-light);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 26px;
        }


        .empty-schedule h3 {
            font-size: 14px;

            margin-bottom: 5px;
        }


        .empty-schedule p {
            color: var(--muted);

            font-size: 10px;
        }


        /* COUNT */

        .result-count {
            margin-bottom: 12px;

            color: var(--muted);

            font-size: 9px;
        }


        .result-count strong {
            color: var(--green);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 700px) {

            .schedule-card {
                align-items: flex-start;

                flex-wrap: wrap;
            }


            .schedule-main {
                width: calc(100% - 87px);
            }


            .schedule-action {
                width: 100%;

                margin-left: 87px;
            }


            .detail-button {
                width: 100%;

                justify-content: center;
            }

        }


        @media (max-width: 500px) {

            .page-header h2 {
                font-size: 21px;
            }


            .filter-group {
                min-width: 100%;
            }


            .filter-button,
            .reset-button {
                width: 100%;

                justify-content: center;
            }


            .schedule-card {
                padding: 15px;
            }


            .schedule-date {
                width: 58px;

                min-height: 70px;
            }


            .schedule-date .day {
                font-size: 21px;
            }


            .schedule-main {
                width: calc(100% - 75px);
            }


            .schedule-action {
                margin-left: 75px;
            }

        }

    </style>

</head>


<body>

<div class="dashboard-wrapper">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-logo">

            <div class="logo-icon">
                ⭐
            </div>

            <div class="logo-text">

                <strong>
                    TBM Bintang Raharja
                </strong>

                <span>
                    Area Peserta
                </span>

            </div>

        </div>


        <nav class="sidebar-menu">

            <div class="menu-title">
                MENU UTAMA
            </div>


            <a
                href="{{ route('peserta.dashboard') }}"
                class="menu-item"
            >

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <a
                href="{{ route('peserta.schedule.index') }}"
                class="menu-item active"
            >

                <span class="menu-icon">
                    📅
                </span>

                <span>
                    Jadwal
                </span>

            </a>


            <a
                href="#"
                class="menu-item"
            >

                <span class="menu-icon">
                    📝
                </span>

                <span>
                    Absensi
                </span>

            </a>


            <a
                href="{{ route('peserta.materials.index') }}"
                class="menu-item"
            >

                <span class="menu-icon">
                    📚
                </span>

                <span>
                    Materi & Tugas
                </span>

            </a>


            <a
                href="#"
                class="menu-item"
            >

                <span class="menu-icon">
                    📈
                </span>

                <span>
                    Progress Belajar
                </span>

            </a>


            <a
                href="#"
                class="menu-item"
            >

                <span class="menu-icon">
                    🏆
                </span>

                <span>
                    Poin & Prestasi
                </span>

            </a>


            <div class="menu-title menu-title-second">
                LAINNYA
            </div>


            <a
                href="#"
                class="menu-item"
            >

                <span class="menu-icon">
                    🤖
                </span>

                <span>
                    BintangBot
                </span>

            </a>


            <a
                href="#"
                class="menu-item"
            >

                <span class="menu-icon">
                    👤
                </span>

                <span>
                    Profil
                </span>

            </a>

        </nav>


        <div class="sidebar-bottom">

            <a
                href="{{ route('home') }}"
                class="back-home"
            >

                <span>
                    🌐
                </span>

                <span>
                    Kembali ke Website
                </span>

            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span>
                        ↪
                    </span>

                    <span>
                        Keluar
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="main-content">


        {{-- TOPBAR --}}

        <header class="topbar">

            <button
                type="button"
                class="mobile-menu-button"
                onclick="toggleSidebar()"
            >
                ☰
            </button>


            <div class="topbar-title">

                <span>
                    Area Peserta
                </span>

                <h1>
                    Jadwal Kegiatan
                </h1>

            </div>


            <div class="topbar-right">

                <button
                    type="button"
                    class="notification-button"
                >
                    🔔
                </button>


                <div class="profile-mini">

                    <div class="profile-avatar">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>


                    <div class="profile-info">

                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            Peserta
                        </span>

                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}

        <div class="content">


            <div class="page-header">

                <span>
                    Kegiatan Pembelajaran
                </span>

                <h2>
                    Jadwal Kegiatan
                </h2>

                <p>
                    Lihat jadwal kegiatan belajar dan aktivitas
                    yang tersedia di TBM Bintang Raharja.
                </p>

            </div>


            {{-- FILTER --}}

            <div class="filter-card">

                <form
                    action="{{ route('peserta.schedule.index') }}"
                    method="GET"
                    class="filter-form"
                >


                    <div class="filter-group">

                        <label for="date">
                            Pilih Tanggal
                        </label>

                        <input
                            type="date"
                            id="date"
                            name="date"
                            value="{{ request('date') }}"
                        >

                    </div>


                    <div class="filter-group">

                        <label for="category">
                            Kategori
                        </label>

                        <select
                            id="category"
                            name="category"
                        >

                            <option value="">
                                Semua Kategori
                            </option>


                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category }}"
                                    {{ request('category') === $category ? 'selected' : '' }}
                                >
                                    {{ $category }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <button
                        type="submit"
                        class="filter-button"
                    >
                        🔍 Filter
                    </button>


                    <a
                        href="{{ route('peserta.schedule.index') }}"
                        class="reset-button"
                    >
                        Reset
                    </a>


                </form>

            </div>


            {{-- RESULT --}}

            <div class="result-count">

                Menampilkan
                <strong>
                    {{ $activities->count() }}
                </strong>
                kegiatan

            </div>


            @if ($activities->count() > 0)


                <div class="schedule-wrapper">


                    @foreach ($activities as $activity)


                        <article class="schedule-card">


                            {{-- DATE --}}

                            <div class="schedule-date">

                                <span class="day">

                                    {{ $activity->date->format('d') }}

                                </span>


                                <span class="month">

                                    {{ $activity->date->translatedFormat('M') }}

                                </span>


                                <span class="year">

                                    {{ $activity->date->format('Y') }}

                                </span>

                            </div>


                            {{-- INFO --}}

                            <div class="schedule-main">


                                <div class="schedule-top">

                                    <span class="schedule-category">

                                        {{ $activity->category }}

                                    </span>

                                </div>


                                <h3>

                                    {{ $activity->title }}

                                </h3>


                                @if ($activity->description)

                                    <p class="schedule-description">

                                        {{ $activity->description }}

                                    </p>

                                @endif


                                <div class="schedule-meta">

                                    <span>

                                        🕘

                                        {{ \Carbon\Carbon::parse($activity->start_time)->format('H.i') }}

                                        -

                                        {{ \Carbon\Carbon::parse($activity->end_time)->format('H.i') }}

                                    </span>


                                    @if ($activity->instructor)

                                        <span>

                                            👨‍🏫

                                            {{ $activity->instructor }}

                                        </span>

                                    @endif


                                    @if ($activity->location)

                                        <span>

                                            📍

                                            {{ $activity->location }}

                                        </span>

                                    @endif

                                </div>


                            </div>


                            {{-- ACTION --}}

                            <div class="schedule-action">

                                <a
                                    href="{{ route('peserta.schedule.show', $activity) }}"
                                    class="detail-button"
                                >

                                    Detail

                                    <span>
                                        →
                                    </span>

                                </a>

                            </div>


                        </article>


                    @endforeach


                </div>


            @else


                <div class="empty-schedule">

                    <div class="empty-schedule-icon">
                        📅
                    </div>


                    <h3>
                        Jadwal tidak ditemukan
                    </h3>


                    <p>
                        Belum ada kegiatan yang sesuai dengan filter yang dipilih.
                    </p>

                </div>


            @endif


        </div>


        {{-- FOOTER --}}

        <footer class="dashboard-footer">

            <p>
                © {{ date('Y') }} TBM Bintang Raharja.
            </p>

            <span>
                Membaca • Belajar • Berkarya • Bersama
            </span>

        </footer>


    </main>

</div>


<script>

function toggleSidebar()
{
    const sidebar = document.getElementById('sidebar');

    sidebar.classList.toggle('show');
}

</script>

</body>

</html>