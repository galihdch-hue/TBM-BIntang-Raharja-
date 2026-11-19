@extends('owner.layout')

@section('title', 'Kelola Kegiatan')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Kelola Kegiatan</h1>
            <p>Atur jadwal dan informasi kegiatan yang tampil di Beranda dan halaman Kegiatan.</p>
        </div>
        <a class="owner-button owner-button--green" href="{{ route('owner.activities.create') }}">+ Tambah kegiatan</a>
    </section>

    <section class="owner-panel owner-table-panel">
        @if ($activities->isEmpty())
            <div class="owner-empty owner-empty--large">
                <span aria-hidden="true">◷</span>
                <strong>Belum ada kegiatan</strong>
                <p>Tambahkan kegiatan agar pengunjung dapat melihat program TBM.</p>
            </div>
        @else
            <div class="owner-table-scroll">
                <table class="owner-table">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Jadwal</th>
                            <th>Pemateri</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>
                                    <strong>{{ $activity->title }}</strong>
                                    <small>{{ $activity->category }}</small>
                                </td>
                                <td>{{ $activity->date->translatedFormat('d M Y') }}<small>{{ substr($activity->start_time, 0, 5) }}–{{ substr($activity->end_time, 0, 5) }}</small></td>
                                <td>{{ $activity->instructor ?: '—' }}</td>
                                <td><span class="owner-status {{ $activity->is_active ? 'owner-status--active' : 'owner-status--inactive' }}">{{ $activity->is_active ? 'Aktif' : 'Disembunyikan' }}</span></td>
                                <td>
                                    <div class="owner-row-actions">
                                        <a class="owner-action-link" href="{{ route('owner.activities.edit', $activity) }}">Edit</a>
                                        <form action="{{ route('owner.activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="owner-action-link owner-action-link--danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="owner-pagination">
                {{ $activities->links() }}
            </div>
        @endif
    </section>
@endsection
