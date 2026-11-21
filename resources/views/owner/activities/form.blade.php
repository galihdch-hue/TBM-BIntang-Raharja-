@extends('owner.layout')

@section('title', $activity->exists ? 'Edit Kegiatan' : 'Tambah Kegiatan')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KEGIATAN</span>
            <h1>{{ $activity->exists ? 'Edit kegiatan' : 'Tambah kegiatan' }}</h1>
            <p>Informasi kegiatan aktif juga akan ditampilkan di Beranda.</p>
        </div>
    </section>

    <form
        class="owner-form owner-panel"
        action="{{ $activity->exists ? route('owner.activities.update', $activity) : route('owner.activities.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @if ($activity->exists)
            @method('PUT')
        @endif

        <div class="owner-form-grid">
            <div class="owner-field owner-field--wide">
                <label for="title">Nama kegiatan <span>*</span></label>
                <input id="title" name="title" type="text" maxlength="255" value="{{ old('title', $activity->title) }}" required>
            </div>
            <div class="owner-field">
                <label for="category">Kategori <span>*</span></label>
                <input id="category" name="category" type="text" maxlength="255" value="{{ old('category', $activity->category) }}" required>
            </div>
            <div class="owner-field">
                <label for="date">Tanggal <span>*</span></label>
                <input id="date" name="date" type="date" value="{{ old('date', $activity->date?->format('Y-m-d')) }}" required>
            </div>
            <div class="owner-field">
                <label for="start_time">Waktu mulai <span>*</span></label>
                <input id="start_time" name="start_time" type="time" value="{{ old('start_time', $activity->start_time ? substr($activity->start_time, 0, 5) : '') }}" required>
            </div>
            <div class="owner-field">
                <label for="end_time">Waktu selesai <span>*</span></label>
                <input id="end_time" name="end_time" type="time" value="{{ old('end_time', $activity->end_time ? substr($activity->end_time, 0, 5) : '') }}" required>
            </div>
            <div class="owner-field">
                <label for="instructor">Pemateri / pendamping</label>
                <input id="instructor" name="instructor" type="text" maxlength="255" value="{{ old('instructor', $activity->instructor) }}">
            </div>
            <div class="owner-field">
                <label for="location">Lokasi</label>
                <input id="location" name="location" type="text" maxlength="255" value="{{ old('location', $activity->location) }}">
            </div>
            <div class="owner-field owner-field--wide">
                <label for="instructor_photo">Foto pemateri (opsional)</label>
                <input
                    id="instructor_photo"
                    name="instructor_photo"
                    type="file"
                    accept="image/jpeg,image/png,image/webp,image/gif,image/bmp"
                    aria-describedby="instructor-photo-help"
                >
                <small id="instructor-photo-help">
                    Maksimal 10 MB. Foto akan dikompres ke WebP dan dipotong memenuhi bingkai agar tidak ada bidang kosong di sisi foto.
                </small>
                @if ($instructorPhotoUrl)
                    <img
                        class="owner-instructor-preview"
                        src="{{ $instructorPhotoUrl }}"
                        alt="Foto pemateri {{ old('instructor', $activity->instructor) }}"
                    >
                @endif
            </div>
            <div class="owner-field owner-field--wide">
                <label for="image">Unggah gambar (opsional)</label>
                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp" aria-describedby="image-help">
                <small id="image-help">Maksimal 10 MB. Gambar otomatis dikompres ke WebP. Mengosongkan input akan mempertahankan gambar saat ini.</small>
                @if ($activity->image)
                    @php
                        $imagePreview = \Illuminate\Support\Str::startsWith($activity->image, ['http://', 'https://'])
                            ? $activity->image
                            : asset('storage/'.$activity->image);
                    @endphp
                    <img class="owner-image-preview" src="{{ $imagePreview }}" alt="Gambar kegiatan saat ini">
                @endif
            </div>
            <div class="owner-field owner-field--wide">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="5">{{ old('description', $activity->description) }}</textarea>
            </div>
        </div>

        <label class="owner-checkbox">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $activity->exists ? $activity->is_active : true))>
            <span>Tampilkan kegiatan di situs</span>
        </label>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('owner.activities.index') }}">Batal</a>
            <button class="owner-button owner-button--green" type="submit">{{ $activity->exists ? 'Simpan perubahan' : 'Buat kegiatan' }}</button>
        </div>
    </form>
@endsection
