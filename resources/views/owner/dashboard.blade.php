@extends('owner.layout')

@section('title', 'Dashboard Pengelola')

@section('content')
    <section class="owner-welcome">
        <div>
            <span class="owner-eyebrow">RUANG PENGELOLAAN</span>
            <h1>Selamat datang, {{ auth()->user()->name }}</h1>
            <p>Kelola informasi yang tampil di situs TBM Bintang Raharja dari satu tempat.</p>
        </div>
        <span class="owner-welcome__mark" aria-hidden="true">✦</span>
    </section>

    <section class="owner-stats" aria-label="Ringkasan konten">
        <article class="owner-stat owner-stat--green">
            <span class="owner-stat__icon" aria-hidden="true">◷</span>
            <span class="owner-stat__label">Total kegiatan</span>
            <strong>{{ $activityCount }}</strong>
            <a href="{{ route('owner.activities.index') }}">Kelola kegiatan <span aria-hidden="true">→</span></a>
        </article>
        <article class="owner-stat owner-stat--blue">
            <span class="owner-stat__icon" aria-hidden="true">▤</span>
            <span class="owner-stat__label">Total berita</span>
            <strong>{{ $newsCount }}</strong>
            <a href="{{ route('owner.news.index') }}">Kelola berita <span aria-hidden="true">→</span></a>
        </article>
        <article class="owner-stat owner-stat--purple">
            <span class="owner-stat__icon" aria-hidden="true">▧</span>
            <span class="owner-stat__label">Dokumentasi galeri</span>
            <strong>{{ $galleryCount }}</strong>
            <a href="{{ route('owner.gallery.index') }}">Kelola galeri <span aria-hidden="true">→</span></a>
        </article>
    </section>

    <section class="owner-quick-actions" aria-label="Aksi cepat">
        <div>
            <span class="owner-eyebrow">AKSI CEPAT</span>
            <h2>Tambahkan konten baru</h2>
        </div>
        <div class="owner-quick-actions__links">
            <a class="owner-button owner-button--green" href="{{ route('owner.activities.create') }}">+ Kegiatan</a>
            <a class="owner-button owner-button--blue" href="{{ route('owner.news.create') }}">+ Berita</a>
            <a class="owner-button owner-button--purple" href="{{ route('owner.gallery.create') }}">+ Galeri</a>
            <a class="owner-button owner-button--quiet" href="{{ route('owner.about.edit') }}">Edit Tentang</a>
            @if (auth()->user()->isPemilik())
                <a class="owner-button owner-button--quiet" href="{{ route('owner.pengurus.index') }}">Kelola Pengurus</a>
            @endif
        </div>
    </section>

    <section class="owner-recent-grid">
        <article class="owner-panel">
            <div class="owner-panel__heading">
                <div>
                    <span class="owner-eyebrow">TERBARU</span>
                    <h2>Kegiatan</h2>
                </div>
                <a href="{{ route('owner.activities.index') }}">Lihat semua</a>
            </div>

            @forelse ($recentActivities as $activity)
                <div class="owner-recent-row">
                    <span class="owner-recent-row__icon owner-recent-row__icon--green">◷</span>
                    <div>
                        <strong>{{ $activity->title }}</strong>
                        <small>{{ $activity->date->translatedFormat('d F Y') }} · {{ $activity->category }}</small>
                    </div>
                    <a href="{{ route('owner.activities.edit', $activity) }}" aria-label="Edit {{ $activity->title }}">Edit</a>
                </div>
            @empty
                <p class="owner-empty">Belum ada kegiatan.</p>
            @endforelse
        </article>

        <article class="owner-panel">
            <div class="owner-panel__heading">
                <div>
                    <span class="owner-eyebrow">TERBARU</span>
                    <h2>Berita</h2>
                </div>
                <a href="{{ route('owner.news.index') }}">Lihat semua</a>
            </div>

            @forelse ($recentNews as $item)
                <div class="owner-recent-row">
                    <span class="owner-recent-row__icon owner-recent-row__icon--blue">▤</span>
                    <div>
                        <strong>{{ $item->title }}</strong>
                        <small>{{ $item->created_at->translatedFormat('d F Y') }} · {{ $item->category }}</small>
                    </div>
                    <a href="{{ route('owner.news.edit', $item) }}" aria-label="Edit {{ $item->title }}">Edit</a>
                </div>
            @empty
                <p class="owner-empty">Belum ada berita.</p>
            @endforelse
        </article>
    </section>
@endsection
