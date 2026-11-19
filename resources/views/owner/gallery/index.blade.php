@extends('owner.layout')

@section('title', 'Kelola Galeri')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Kelola Galeri</h1>
            <p>Atur foto dokumentasi dan informasi kegiatan TBM.</p>
        </div>
        <a class="owner-button owner-button--purple" href="{{ route('owner.gallery.create') }}">+ Tambah dokumentasi</a>
    </section>

    <section class="owner-panel owner-table-panel">
        @if ($galleries->isEmpty())
            <div class="owner-empty owner-empty--large">
                <span aria-hidden="true">▧</span>
                <strong>Belum ada dokumentasi</strong>
                <p>Tambahkan dokumentasi agar galeri publik menampilkan foto kegiatan.</p>
            </div>
        @else
            <div class="owner-table-scroll">
                <table class="owner-table">
                    <thead>
                        <tr>
                            <th>Dokumentasi</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td class="owner-gallery-cell">
                                    <img src="{{ \Illuminate\Support\Str::startsWith($gallery->image, ['http://', 'https://']) ? $gallery->image : asset('storage/'.$gallery->image) }}" alt="" loading="lazy">
                                    <strong>{{ $gallery->title }}</strong>
                                </td>
                                <td>{{ $gallery->category }}</td>
                                <td>{{ $gallery->date?->translatedFormat('d M Y') ?: '—' }}</td>
                                <td><span class="owner-status {{ $gallery->is_active ? 'owner-status--active' : 'owner-status--inactive' }}">{{ $gallery->is_active ? 'Tampil' : 'Disembunyikan' }}</span></td>
                                <td>
                                    <div class="owner-row-actions">
                                        <a class="owner-action-link" href="{{ route('owner.gallery.edit', $gallery) }}">Edit</a>
                                        <form action="{{ route('owner.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus dokumentasi ini?')">
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
                {{ $galleries->links() }}
            </div>
        @endif
    </section>
@endsection
