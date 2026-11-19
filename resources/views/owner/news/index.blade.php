@extends('owner.layout')

@section('title', 'Kelola Berita')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Kelola Berita</h1>
            <p>Buat dan perbarui kabar yang ditampilkan kepada pengunjung.</p>
        </div>
        <a class="owner-button owner-button--blue" href="{{ route('owner.news.create') }}">+ Tambah berita</a>
    </section>

    <section class="owner-panel owner-table-panel">
        @if ($news->isEmpty())
            <div class="owner-empty owner-empty--large">
                <span aria-hidden="true">▤</span>
                <strong>Belum ada berita</strong>
                <p>Tambahkan berita pertama untuk halaman Berita.</p>
            </div>
        @else
            <div class="owner-table-scroll">
                <table class="owner-table">
                    <thead>
                        <tr>
                            <th>Berita</th>
                            <th>Slug</th>
                            <th>Tanggal terbit</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                    <small>{{ $item->category }}</small>
                                </td>
                                <td><code>{{ $item->slug }}</code></td>
                                <td>{{ $item->published_at?->translatedFormat('d M Y') ?: 'Belum dijadwalkan' }}</td>
                                <td><span class="owner-status {{ $item->is_published ? 'owner-status--active' : 'owner-status--inactive' }}">{{ $item->is_published ? 'Terbit' : 'Draft' }}</span></td>
                                <td>
                                    <div class="owner-row-actions">
                                        <a class="owner-action-link" href="{{ route('owner.news.edit', $item) }}">Edit</a>
                                        <form action="{{ route('owner.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
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
                {{ $news->links() }}
            </div>
        @endif
    </section>
@endsection
