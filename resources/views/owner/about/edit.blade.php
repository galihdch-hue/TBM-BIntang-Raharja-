@extends('owner.layout')

@section('title', 'Edit Tentang')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Edit Halaman Tentang</h1>
            <p>Kelola seluruh teks, daftar konten, dan foto yang tampil di halaman Tentang.</p>
        </div>
    </section>

    <form class="owner-form owner-panel" action="{{ route('owner.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php
            $missionItems = old('mission.items', $about['mission']['items']);
            $historyItems = old('history.items', $about['history']['items']);
            $valueItems = old('values.items', $about['values']['items']);
            $missionItems = is_array($missionItems) ? $missionItems : $about['mission']['items'];
            $historyItems = is_array($historyItems) ? $historyItems : $about['history']['items'];
            $valueItems = is_array($valueItems) ? $valueItems : $about['values']['items'];
            $overviewParagraphs = old('overview.paragraphs', $about['overview']['paragraphs']);
            $biographyParagraphs = old('biography.paragraphs', $about['biography']['paragraphs']);
            $overviewParagraphs = is_array($overviewParagraphs) ? $overviewParagraphs : $about['overview']['paragraphs'];
            $biographyParagraphs = is_array($biographyParagraphs) ? $biographyParagraphs : $about['biography']['paragraphs'];
            $missionNextIndex = $missionItems === [] ? 0 : max(array_map('intval', array_keys($missionItems))) + 1;
            $historyNextIndex = $historyItems === [] ? 0 : max(array_map('intval', array_keys($historyItems))) + 1;
            $valueNextIndex = $valueItems === [] ? 0 : max(array_map('intval', array_keys($valueItems))) + 1;
            $overviewNextIndex = $overviewParagraphs === [] ? 0 : max(array_map('intval', array_keys($overviewParagraphs))) + 1;
            $biographyNextIndex = $biographyParagraphs === [] ? 0 : max(array_map('intval', array_keys($biographyParagraphs))) + 1;
        @endphp

        <section class="owner-form-section">
            <h2>Foto halaman Tentang</h2>
            <p class="owner-form-note">Pilih file gambar. Maksimal 10 MB; foto otomatis diperkecil dan disimpan sebagai WebP.</p>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="about-logo">Logo / foto utama</label>
                    <input id="about-logo" name="images[logo]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp" aria-describedby="about-logo-help">
                    <small id="about-logo-help">Batas 10 MB; maksimum 6000 × 6000 piksel.</small>
                    <img class="owner-image-preview" src="{{ $imageUrls['logo'] }}" alt="Logo halaman Tentang saat ini">
                </div>
                <div class="owner-field">
                    <label for="about-biography">Foto biografi</label>
                    <input id="about-biography" name="images[biography]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp" aria-describedby="about-biography-help">
                    <small id="about-biography-help">Batas 10 MB; maksimum 6000 × 6000 piksel.</small>
                    <img class="owner-image-preview" src="{{ $imageUrls['biography'] }}" alt="Foto biografi saat ini">
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Bagian pembuka</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="hero-eyebrow">Label</label>
                    <input id="hero-eyebrow" name="hero[eyebrow]" value="{{ old('hero.eyebrow', $about['hero']['eyebrow']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="hero-name">Nama TBM</label>
                    <input id="hero-name" name="hero[name]" value="{{ old('hero.name', $about['hero']['name']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="hero-title">Judul</label>
                    <input id="hero-title" name="hero[title]" value="{{ old('hero.title', $about['hero']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="hero-description">Deskripsi</label>
                    <textarea id="hero-description" name="hero[description]" required>{{ old('hero.description', $about['hero']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Tentang TBM</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="overview-label">Label</label>
                    <input id="overview-label" name="overview[label]" value="{{ old('overview.label', $about['overview']['label']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="overview-title-prefix">Awal judul</label>
                    <input id="overview-title-prefix" name="overview[title_prefix]" value="{{ old('overview.title_prefix', $about['overview']['title_prefix']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="overview-title-highlight">Sorotan judul</label>
                    <input id="overview-title-highlight" name="overview[title_highlight]" value="{{ old('overview.title_highlight', $about['overview']['title_highlight']) }}" required>
                </div>
                <div class="owner-repeater" data-repeater data-next-index="{{ $overviewNextIndex }}" data-label="Paragraf">
                    <div class="owner-repeater__items" data-repeater-items>
                        @foreach ($overviewParagraphs as $index => $paragraph)
                            <div class="owner-editor-card owner-repeater-item">
                                <div class="owner-editor-card__heading">
                                    <h3>Paragraf {{ $loop->iteration }}</h3>
                                    <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                                </div>
                                <div class="owner-field">
                                    <label for="overview-paragraph-{{ $index }}">Isi paragraf</label>
                                    <textarea id="overview-paragraph-{{ $index }}" name="overview[paragraphs][{{ $index }}]" required>{{ is_string($paragraph) ? $paragraph : '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah paragraf</button>
                    <template data-repeater-template>
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Paragraf baru</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="overview-paragraph-__INDEX__">Isi paragraf</label>
                                <textarea id="overview-paragraph-__INDEX__" name="overview[paragraphs][__INDEX__]" required></textarea>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Biografi</h2>
            <div class="owner-form-grid">
                @foreach (['section_title' => 'Label bagian', 'name' => 'Judul bagian', 'person_name' => 'Nama tokoh', 'role' => 'Jabatan', 'label' => 'Label biografi', 'title' => 'Judul biografi', 'highlight_title' => 'Judul sorotan'] as $key => $label)
                    <div class="owner-field">
                        <label for="biography-{{ $key }}">{{ $label }}</label>
                        <input id="biography-{{ $key }}" name="biography[{{ $key }}]" value="{{ old('biography.'.$key, $about['biography'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="biography-summary">Ringkasan bagian</label>
                    <textarea id="biography-summary" name="biography[summary]" required>{{ old('biography.summary', $about['biography']['summary']) }}</textarea>
                </div>
                <div class="owner-repeater" data-repeater data-next-index="{{ $biographyNextIndex }}" data-label="Paragraf biografi">
                    <div class="owner-repeater__items" data-repeater-items>
                        @foreach ($biographyParagraphs as $index => $paragraph)
                            <div class="owner-editor-card owner-repeater-item">
                                <div class="owner-editor-card__heading">
                                    <h3>Paragraf biografi {{ $loop->iteration }}</h3>
                                    <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                                </div>
                                <div class="owner-field">
                                    <label for="biography-paragraph-{{ $index }}">Isi paragraf</label>
                                    <textarea id="biography-paragraph-{{ $index }}" name="biography[paragraphs][{{ $index }}]" required>{{ is_string($paragraph) ? $paragraph : '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah paragraf</button>
                    <template data-repeater-template>
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Paragraf biografi baru</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="biography-paragraph-__INDEX__">Isi paragraf</label>
                                <textarea id="biography-paragraph-__INDEX__" name="biography[paragraphs][__INDEX__]" required></textarea>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="biography-highlight-content">Isi sorotan</label>
                    <textarea id="biography-highlight-content" name="biography[highlight_content]" required>{{ old('biography.highlight_content', $about['biography']['highlight_content']) }}</textarea>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Visi dan misi</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="vision-title">Judul visi</label>
                    <input id="vision-title" name="vision[title]" value="{{ old('vision.title', $about['vision']['title']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="mission-title">Judul misi</label>
                    <input id="mission-title" name="mission[title]" value="{{ old('mission.title', $about['mission']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="vision-content">Isi visi</label>
                    <textarea id="vision-content" name="vision[content]" required>{{ old('vision.content', $about['vision']['content']) }}</textarea>
                </div>
                <div class="owner-repeater" data-repeater data-next-index="{{ $missionNextIndex }}" data-label="Misi">
                    <div class="owner-repeater__items" data-repeater-items>
                        @foreach ($missionItems as $index => $mission)
                            <div class="owner-editor-card owner-repeater-item">
                                <div class="owner-editor-card__heading">
                                    <h3>Misi {{ $loop->iteration }}</h3>
                                    <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                                </div>
                                <div class="owner-field">
                                    <label for="mission-{{ $index }}">Isi misi</label>
                                    <textarea id="mission-{{ $index }}" name="mission[items][{{ $index }}]" required>{{ old('mission.items.'.$index, is_string($mission) ? $mission : '') }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah misi</button>
                    <template data-repeater-template>
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Misi baru</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="mission-__INDEX__">Isi misi</label>
                                <textarea id="mission-__INDEX__" name="mission[items][__INDEX__]" required></textarea>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Sejarah</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="history-title">Judul bagian</label>
                    <input id="history-title" name="history[title]" value="{{ old('history.title', $about['history']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="history-description">Deskripsi bagian</label>
                    <textarea id="history-description" name="history[description]" required>{{ old('history.description', $about['history']['description']) }}</textarea>
                </div>
                <div class="owner-repeater" data-repeater data-next-index="{{ $historyNextIndex }}" data-label="Perjalanan">
                    <div class="owner-repeater__items" data-repeater-items>
                        @foreach ($historyItems as $index => $item)
                            <div class="owner-editor-card owner-repeater-item">
                                <div class="owner-editor-card__heading">
                                    <h3>Perjalanan {{ $loop->iteration }}</h3>
                                    <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                                </div>
                                <div class="owner-form-grid">
                                    <div class="owner-field">
                                        <label for="history-year-{{ $index }}">Tahun / tanggal</label>
                                        <input id="history-year-{{ $index }}" name="history[items][{{ $index }}][year]" value="{{ data_get($item, 'year', '') }}" required>
                                    </div>
                                    <div class="owner-field owner-field--wide">
                                        <label for="history-item-title-{{ $index }}">Judul</label>
                                        <input id="history-item-title-{{ $index }}" name="history[items][{{ $index }}][title]" value="{{ data_get($item, 'title', '') }}" required>
                                    </div>
                                    <div class="owner-field owner-field--wide">
                                        <label for="history-description-{{ $index }}">Deskripsi</label>
                                        <textarea id="history-description-{{ $index }}" name="history[items][{{ $index }}][description]" required>{{ data_get($item, 'description', '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah perjalanan</button>
                    <template data-repeater-template>
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Perjalanan baru</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="history-year-__INDEX__">Tahun / tanggal</label>
                                    <input id="history-year-__INDEX__" name="history[items][__INDEX__][year]" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="history-item-title-__INDEX__">Judul</label>
                                    <input id="history-item-title-__INDEX__" name="history[items][__INDEX__][title]" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="history-description-__INDEX__">Deskripsi</label>
                                    <textarea id="history-description-__INDEX__" name="history[items][__INDEX__][description]" required></textarea>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Nilai TBM</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="values-title">Judul bagian</label>
                    <input id="values-title" name="values[title]" value="{{ old('values.title', $about['values']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="values-description">Deskripsi bagian</label>
                    <textarea id="values-description" name="values[description]" required>{{ old('values.description', $about['values']['description']) }}</textarea>
                </div>
                <div class="owner-repeater" data-repeater data-next-index="{{ $valueNextIndex }}" data-label="Nilai">
                    <div class="owner-repeater__items" data-repeater-items>
                        @foreach ($valueItems as $index => $value)
                            <div class="owner-editor-card owner-repeater-item">
                                <div class="owner-editor-card__heading">
                                    <h3>Nilai {{ $loop->iteration }}</h3>
                                    <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                                </div>
                                <div class="owner-form-grid">
                                    <div class="owner-field owner-field--wide">
                                        <label for="value-title-{{ $index }}">Nama nilai</label>
                                        <input id="value-title-{{ $index }}" name="values[items][{{ $index }}][title]" value="{{ data_get($value, 'title', '') }}" required>
                                    </div>
                                    <div class="owner-field owner-field--wide">
                                        <label for="value-description-{{ $index }}">Deskripsi</label>
                                        <textarea id="value-description-{{ $index }}" name="values[items][{{ $index }}][description]" required>{{ data_get($value, 'description', '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah nilai</button>
                    <template data-repeater-template>
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Nilai baru</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field owner-field--wide">
                                    <label for="value-title-__INDEX__">Nama nilai</label>
                                    <input id="value-title-__INDEX__" name="values[items][__INDEX__][title]" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="value-description-__INDEX__">Deskripsi</label>
                                    <textarea id="value-description-__INDEX__" name="values[items][__INDEX__][description]" required></textarea>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Penutup</h2>
            <div class="owner-form-grid">
                <div class="owner-field owner-field--wide">
                    <label for="cta-title">Judul</label>
                    <input id="cta-title" name="cta[title]" value="{{ old('cta.title', $about['cta']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="cta-description">Deskripsi</label>
                    <textarea id="cta-description" name="cta[description]" required>{{ old('cta.description', $about['cta']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('about') }}" target="_blank" rel="noopener noreferrer">Lihat halaman</a>
            <button class="owner-button owner-button--green" type="submit">Simpan perubahan</button>
        </div>
    </form>

@endsection
