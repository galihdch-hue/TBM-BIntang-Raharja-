<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Materi & Tugas - TBM Bintang Raharja
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

        .page-header {
            margin-bottom: 25px;
        }

        .page-header span {
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .page-header h2 {
            font-size: 25px;
            margin-top: 5px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 7px;
        }

        .material-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .learning-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            transition: .2s;
        }

        .learning-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(16,42,67,.07);
        }

        .learning-cover {
            height: 125px;
            background: var(--green-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .learning-content {
            padding: 18px;
        }

        .learning-category {
            display: inline-block;
            background: var(--green-light);
            color: var(--green-dark);
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .learning-content h3 {
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 7px;
        }

        .learning-content p {
            color: var(--muted);
            font-size: 9px;
            line-height: 1.6;
            min-height: 42px;
        }

        .learning-footer {
            margin-top: 15px;
            padding-top: 13px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .learning-type {
            font-size: 8px;
            color: var(--muted);
        }

        .learning-button {
            background: var(--green);
            color: white;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 9px;
            font-weight: 700;
        }

        .learning-button:hover {
            background: var(--green-dark);
        }

        .empty-learning {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 60px 20px;
            text-align: center;
            color: var(--muted);
        }

        .empty-learning div {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .empty-learning p {
            font-size: 11px;
        }

        @media (max-width: 1000px) {

            .material-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 650px) {

            .material-grid {
                grid-template-columns: 1fr;
            }

            .page-header h2 {
                font-size: 21px;
            }

        }

    </style>

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
                class="menu-item"
            >
                <span class="menu-icon">🏠</span>
                <span>Dashboard</span>
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
                <span class="menu-icon">📝</span>
                <span>Absensi</span>
            </a>


            <a
                href="{{ route('peserta.materials.index') }}"
                class="menu-item active"
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
                    Materi & Tugas
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


        <div class="content">


            <div class="page-header">

                <span>
                    Pembelajaran
                </span>

                <h2>
                    Materi & Tugas
                </h2>

                <p>
                    Pelajari materi yang tersedia dan lanjutkan
                    proses belajar kamu di TBM Bintang Raharja.
                </p>

            </div>


            @if ($materials->count() > 0)

                <div class="material-grid">

                    @foreach ($materials as $material)

                        <article class="learning-card">


                            <div class="learning-cover">

                                @if ($material->category === 'Teknologi')

                                    💻

                                @elseif ($material->category === 'Literasi')

                                    📖

                                @elseif ($material->category === 'Kreativitas')

                                    🎨

                                @else

                                    📚

                                @endif

                            </div>


                            <div class="learning-content">

                                <span class="learning-category">

                                    {{ $material->category }}

                                </span>


                                <h3>
                                    {{ $material->title }}
                                </h3>


                                <p>
                                    {{ $material->description }}
                                </p>


                                <div class="learning-footer">

                                    <span class="learning-type">

                                        📚
                                        {{ ucfirst($material->type) }}

                                    </span>


                                    <a
                                        href="{{ route('peserta.materials.show', $material) }}"
                                        class="learning-button"
                                    >
                                        Pelajari →
                                    </a>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <div class="empty-learning">

                    <div>
                        📚
                    </div>

                    <p>
                        Belum ada materi pembelajaran.
                    </p>

                </div>

            @endif


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


<script>

function toggleSidebar()
{
    const sidebar = document.getElementById('sidebar');

    sidebar.classList.toggle('show');
}

</script>

</body>

</html>