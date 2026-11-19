<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        return view('owner.gallery.index', [
            'galleries' => Gallery::query()->orderByDesc('date')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('owner.gallery.form', [
            'gallery' => new Gallery,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => [
                'required',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'date' => ['nullable', 'date'],
            'is_active' => ['sometimes', 'boolean'],
        ], [
            'image.required' => 'Pilih file gambar untuk dokumentasi galeri.',
            'image.image' => 'File gambar galeri harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar galeri maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar galeri gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar galeri maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $upload = $validated['image'];
        $validated['image'] = $this->imageStorage->store($upload, 'uploads/gallery');

        Gallery::create($validated);

        return redirect()
            ->route('owner.gallery.index')
            ->with('success', 'Dokumentasi galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('owner.gallery.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'date' => ['nullable', 'date'],
            'is_active' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'File gambar galeri harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar galeri maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar galeri gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar galeri maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $upload = $validated['image'] ?? null;
        unset($validated['image']);

        if ($upload instanceof UploadedFile) {
            $previousImage = $gallery->image;
            $validated['image'] = $this->imageStorage->store($upload, 'uploads/gallery');
        }

        $gallery->update($validated);

        if (isset($previousImage)) {
            $this->imageStorage->delete($previousImage);
        }

        return redirect()
            ->route('owner.gallery.index')
            ->with('success', 'Dokumentasi galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $image = $gallery->image;
        $gallery->delete();
        $this->imageStorage->delete($image);

        return redirect()
            ->route('owner.gallery.index')
            ->with('success', 'Dokumentasi galeri berhasil dihapus.');
    }
}
