@extends('owner.layout')

@section('title', 'Kelola Pengurus')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">AKSES PENGELOLAAN</span>
            <h1>Kelola Pengurus</h1>
            <p>Pengurus dapat mengelola konten situs, tetapi tidak dapat mengelola akun pemilik.</p>
        </div>
        <a class="owner-button owner-button--green" href="{{ route('owner.pengurus.create') }}">+ Tambah pengurus</a>
    </section>

    <section class="owner-panel owner-table-panel">
        @if ($pengurus->isEmpty())
            <div class="owner-empty owner-empty--large">
                <span aria-hidden="true">♙</span>
                <strong>Belum ada akun pengurus</strong>
                <p>Buat akun pengurus agar dapat membantu mengelola konten TBM.</p>
            </div>
        @else
            <div class="owner-table-scroll">
                <table class="owner-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurus as $account)
                            <tr>
                                <td><strong>{{ $account->name }}</strong></td>
                                <td>{{ $account->email }}</td>
                                <td><span class="owner-status owner-status--active">Pengurus</span></td>
                                <td>
                                    <div class="owner-row-actions">
                                        <a class="owner-action-link" href="{{ route('owner.pengurus.edit', $account) }}">Edit</a>
                                        <form action="{{ route('owner.pengurus.destroy', $account) }}" method="POST" onsubmit="return confirm('Hapus akun pengurus ini?')">
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
                {{ $pengurus->links() }}
            </div>
        @endif
    </section>
@endsection
