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

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/peserta-dashboard.css') }}"
    >

    <style>

        .schedule-detail {
            max-width: 850px;

            margin: 0 auto;
        }


        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: var(--green);

            font-size: 10px;

            font-weight: 600;

            margin-bottom: 18px;
        }


        .detail-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 15px;

            overflow: hidden;
        }


        .detail-header {
            background: var(--green-light);

            padding: 35px;
        }


        .detail-category {
            display: inline-block;

            background: white;

            color: var(--green-dark);

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 9px;

            font-weight: 700;

            margin-bottom: 12px;
        }


        .detail-header h2 {
            font-size: 25px;

            line-height: 1.4;

            margin-bottom: 9px;
        }


        .detail-header p {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.7;
        }


        .detail-body {
            padding: 30px 35px;
        }


        .info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 12px;

            margin-bottom: 28px;
        }


        .info-box {
            border: 1px solid var(--border);

            border-radius: 10px;

            padding: 14px;

            background: #fcfdfd;
        }


        .info-box span {
            display: block;

            color: var(--muted);

            font-size: 8px;

            margin-bottom: 5px;
        }


        .info-box strong {
            display: block;

            color: var(--text);

            font-size: 11px;
        }


        .description-section h3 {
            font-size: 15px;

            margin-bottom: 9px;
        }


        .description-section p {
            color: #475467;

            font-size: 11px;

            line-height: 1.9;
        }


        .attendance-notice {
            margin-top: 25px;

            padding: 16px;

            border-radius: 10px;

            background: var(--green-light);

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .attendance-icon {
            width: 40px;

            height: 40px;

            border-radius: 10px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

            flex-shrink: 0;
        }


        .attendance-notice strong {
            display: block;

            font-size: 10px;

            margin-bottom: 3px;
        }


        .attendance-notice p {
            color: var(--muted);

            font-size: 8px;

            line-height: 1.5;
        }


        @media (max-width: 600px) {

            .detail-header,
            .detail-body {
                padding: 22px;
            }


            .detail-header h2 {
                font-size: 20px;
            }


            .info-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="dashboard-wrapper">


    {{-- SIDEBAR --}}

    <aside class="sidebar">

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
                <span class="menu-icon">🏠</span>
                <span>Dashboard</span>
            </a>


            <a
                href="{{ route('peserta.schedule.index') }}"
                class="menu-item active"
            >
                <span class="menu-icon">📅</span>
                <span>Jadwal</span>
            </a>


            <a
                href="#"
                class="menu-item"
            >
                <span class="menu-icon">📝</span>
                <span>Absensi</span>
            </a>


            <a
                href="{{ route('peserta.materials.index') }}"
                class="menu-item"
            >
                <span class="menu-icon">📚</span>
                <span>Materi & Tugas</span>
            </a>


            <a
                href="#"
                class="menu-item"
            >
                <span class="menu-icon">📈</span>
                <span>Progress Belajar</span>
            </a>


            <a
                href="#"
                class="menu-item"
            >
                <span class="menu-icon">🏆</span>
                <span>Poin & Prestasi</span>
            </a>


            <div class="menu-title menu-title-second">
                LAINNYA
            </div>


            <a href="#" class="menu-item">
                <span class="menu-icon">🤖</span>
                <span>BintangBot</span>
            </a>


            <a href="#" class="menu-item">
                <span class="menu-icon">👤</span>
                <span>Profil</span>
            </a>

        </nav>


        <div class="sidebar-bottom">

            <a
                href="{{ route('home') }}"
                class="back-home"
            >
                <span>🌐</span>
                <span>Kembali ke Website</span>
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

                    <span>↪</span>

                    <span>
                        Keluar
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}

    <main class="main-content">


        <header class="topbar">

            <div class="topbar-title">

                <span>
                    Area Peserta
                </span>

                <h1>
                    Detail Kegiatan
                </h1>

            </div>


            <div class="topbar-right">

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


        <div class="content">


            <div class="schedule-detail">


                <a
                    href="{{ route('peserta.schedule.index') }}"
                    class="back-link"
                >
                    ← Kembali ke Jadwal
                </a>


                <article class="detail-card">


                    <header class="detail-header">

                        <span class="detail-category">

                            {{ $activity->category }}

                        </span>


                        <h2>
                            {{ $activity->title }}
                        </h2>


                        @if ($activity->description)

                            <p>
                                {{ $activity->description }}
                            </p>

                        @endif

                    </header>


                    <div class="detail-body">


                        <div class="info-grid">


                            <div class="info-box">

                                <span>
                                    📅 Tanggal
                                </span>

                                <strong>

                                    {{ $activity->date->translatedFormat('l, d F Y') }}

                                </strong>

                            </div>


                            <div class="info-box">

                                <span>
                                    🕘 Waktu
                                </span>

                                <strong>

                                    {{ \Carbon\Carbon::parse($activity->start_time)->format('H.i') }}

                                    -

                                    {{ \Carbon\Carbon::parse($activity->end_time)->format('H.i') }}

                                </strong>

                            </div>


                            <div class="info-box">

                                <span>
                                    👨‍🏫 Pengajar
                                </span>

                                <strong>

                                    {{ $activity->instructor ?? 'Belum ditentukan' }}

                                </strong>

                            </div>


                            <div class="info-box">

                                <span>
                                    📍 Lokasi
                                </span>

                                <strong>

                                    {{ $activity->location ?? 'Belum ditentukan' }}

                                </strong>

                            </div>


                        </div>


                        <div class="description-section">

                            <h3>
                                Tentang Kegiatan
                            </h3>


                            <p>

                                {{ $activity->description ?? 'Belum ada deskripsi kegiatan.' }}

                            </p>

                        </div>


                        <div class="attendance-notice">

                            <div class="attendance-icon">
                                📝
                            </div>


                            <div>

                                <strong>
                                    Jangan lupa hadir!
                                </strong>

                                <p>
                                    Kehadiran kamu pada kegiatan ini
                                    nantinya akan tercatat melalui sistem absensi peserta.
                                </p>

                            </div>

                        </div>


                    </div>

                </article>


            </div>


        </div>


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

</body>

</html>