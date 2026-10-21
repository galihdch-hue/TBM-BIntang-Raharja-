<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Peserta - TBM Bintang Raharja</title>

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

</head>

<body>

<div class="dashboard-wrapper">


    {{-- SIDEBAR --}}

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
                class="menu-item active"
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
    class="menu-item"
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


            <a
                href="{{ route('login') }}"
                class="logout-button"
            >

                <span>
                    ↪
                </span>

                <span>
                    Keluar
                </span>

            </a>

        </div>

    </aside>


    {{-- MAIN CONTENT --}}

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
                    Dashboard
                </h1>

            </div>


            <div class="topbar-right">

                <button
                    type="button"
                    class="notification-button"
                >

                    🔔

                    <span class="notification-dot"></span>

                </button>


                <div class="profile-mini">

                    <div class="profile-avatar">
                        {{ strtoupper(substr($participant['name'], 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <strong>
                            {{ $participant['name'] }}
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


            {{-- WELCOME --}}

            <section class="welcome-card">

                <div class="welcome-content">

                    <span class="welcome-label">
                        👋 Selamat datang kembali!
                    </span>

                    <h2>
                        Halo, {{ $participant['name'] }}!
                    </h2>

                    <p>
                        Yuk lanjutkan perjalanan belajar kamu
                        bersama TBM Bintang Raharja.
                    </p>

                    <a
    href="{{ route('peserta.schedule.index') }}"
    class="welcome-button"
>
    Lihat Jadwal
    <span>→</span>
</a>

                </div>


                <div class="welcome-decoration">

                    <div class="book-decoration">
                        📚
                    </div>

                    <div class="star-decoration star-one">
                        ✦
                    </div>

                    <div class="star-decoration star-two">
                        ✦
                    </div>

                    <div class="circle-decoration"></div>

                </div>

            </section>


            {{-- STATISTICS --}}

            <section class="stats-grid">

                @foreach ($stats as $stat)

                    <div class="stat-card">

                        <div class="stat-icon">
                            {{ $stat['icon'] }}
                        </div>

                        <div class="stat-content">

                            <span>
                                {{ $stat['label'] }}
                            </span>

                            <strong>
                                {{ $stat['value'] }}
                            </strong>

                        </div>

                    </div>

                @endforeach

            </section>


            {{-- MAIN GRID --}}

            <div class="dashboard-grid">


                {{-- JADWAL --}}

                <section
                    class="content-card schedule-card"
                    id="jadwal"
                >

                    <div class="card-header">

                        <div>

                            <span class="card-label">
                                Kegiatan
                            </span>

                            <h3>
                                Jadwal Terdekat
                            </h3>

                        </div>

                        <a href="#">
                            Lihat semua
                        </a>

                    </div>


                    <div class="schedule-list">

                        @forelse ($upcomingActivities as $activity)

                            <div class="schedule-item">

                                <div class="date-box">

                                    <strong>
                                        {{ \Carbon\Carbon::parse($activity['date'])->format('d') }}
                                    </strong>

                                    <span>
                                        {{ \Carbon\Carbon::parse($activity['date'])->translatedFormat('M') }}
                                    </span>

                                </div>


                                <div class="schedule-info">

                                    <div class="schedule-title-row">

                                        <h4>
                                            {{ $activity['title'] }}
                                        </h4>

                                        <span class="category-badge">
                                            {{ $activity['category'] }}
                                        </span>

                                    </div>

                                    <p>
                                        🕘 {{ $activity['time'] }}
                                    </p>

                                    <p>
                                        📍 {{ $activity['location'] }}
                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="empty-state">

                                <div>
                                    📅
                                </div>

                                <p>
                                    Belum ada kegiatan terdekat.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </section>


                {{-- PROGRESS --}}

                <section class="content-card progress-card">

                    <div class="card-header">

                        <div>

                            <span class="card-label">
                                Perkembangan
                            </span>

                            <h3>
                                Progress Belajar
                            </h3>

                        </div>

                        <a href="#">
                            Detail
                        </a>

                    </div>


                    <div class="progress-list">

                        @foreach ($progress as $item)

                            <div class="progress-item">

                                <div class="progress-title">

                                    <span>
                                        {{ $item['title'] }}
                                    </span>

                                    <strong>
                                        {{ $item['percentage'] }}%
                                    </strong>

                                </div>


                                <div class="progress-bar">

                                    <div
                                        class="progress-fill"
                                        style="width: {{ $item['percentage'] }}%"
                                    ></div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    <div class="overall-progress">

                        <div class="overall-circle">

                            <strong>
                                82%
                            </strong>

                            <span>
                                Overall
                            </span>

                        </div>

                        <div>

                            <strong>
                                Terus semangat! 🔥
                            </strong>

                            <p>
                                Progress belajar kamu terus berkembang.
                            </p>

                        </div>

                    </div>

                </section>


            </div>


            {{-- SECOND GRID --}}

            <div class="dashboard-grid second-grid">


                {{-- MATERIAL --}}

                <section class="content-card">

                    <div class="card-header">

                        <div>

                            <span class="card-label">
                                Pembelajaran
                            </span>

                            <h3>
                                Materi & Tugas Terbaru
                            </h3>

                        </div>

                        <a href="#">
                            Lihat semua
                        </a>

                    </div>


                    <div class="material-list">

                        @foreach ($materials as $material)

                            <div class="material-item">

                                <div class="material-icon">

                                    @if ($material['type'] === 'Tugas')
                                        📝
                                    @else
                                        📖
                                    @endif

                                </div>


                                <div class="material-info">

                                    <span class="material-type">
                                        {{ $material['type'] }}
                                    </span>

                                    <h4>
                                        {{ $material['title'] }}
                                    </h4>

                                    <p>
                                        {{ $material['date'] }}
                                    </p>

                                </div>


                                <span
                                    class="material-status
                                    {{ $material['status'] === 'Selesai'
                                        ? 'status-done'
                                        : 'status-pending' }}"
                                >

                                    {{ $material['status'] }}

                                </span>

                            </div>

                        @endforeach

                    </div>

                </section>


                {{-- POIN --}}

                <section class="content-card points-card">

                    <div class="card-header">

                        <div>

                            <span class="card-label">
                                Pencapaian
                            </span>

                            <h3>
                                Poin & Prestasi
                            </h3>

                        </div>

                        <a href="#">
                            Semua
                        </a>

                    </div>


                    <div class="points-summary">

                        <div class="points-icon">
                            🏆
                        </div>

                        <div>

                            <span>
                                Total poin
                            </span>

                            <strong>
                                850
                            </strong>

                        </div>

                    </div>


                    <div class="achievement-list">

                        @foreach ($achievements as $achievement)

                            <div class="achievement-item">

                                <div class="achievement-icon">
                                    {{ $achievement['icon'] }}
                                </div>

                                <div>

                                    <h4>
                                        {{ $achievement['title'] }}
                                    </h4>

                                    <p>
                                        {{ $achievement['description'] }}
                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </section>

            </div>


            {{-- BOT CTA --}}

            <section class="bot-card">

                <div class="bot-icon">
                    🤖
                </div>


                <div class="bot-content">

                    <span>
                        BintangBot
                    </span>

                    <h3>
                        Butuh bantuan belajar?
                    </h3>

                    <p>
                        Tanya BintangBot tentang materi,
                        kegiatan, atau hal lainnya seputar TBM.
                    </p>

                </div>


                <a
                    href="#"
                    class="bot-button"
                >
                    Mulai Chat
                    <span>→</span>
                </a>

            </section>


        </div>


        {{-- FOOTER --}}

        <footer class="dashboard-footer">

            <p>
                © {{ date('Y') }} TBM Bintang Raharja.
                Semua hak dilindungi.
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


document.addEventListener('click', function(event)
{
    const sidebar = document.getElementById('sidebar');

    const button = document.querySelector('.mobile-menu-button');

    if (
        window.innerWidth <= 900 &&
        sidebar.classList.contains('show') &&
        !sidebar.contains(event.target) &&
        !button.contains(event.target)
    ) {
        sidebar.classList.remove('show');
    }
});

</script>

</body>

</html>