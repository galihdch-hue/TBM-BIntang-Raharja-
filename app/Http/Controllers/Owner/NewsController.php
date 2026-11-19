<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        return view('owner.news.index', [
            'news' => News::query()->orderByDesc('created_at')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('owner.news.form', [
            'news' => new News,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'alpha_dash', 'max:255', Rule::unique('news', 'slug')],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'image' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'File gambar berita harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar berita maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar berita gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar berita maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $upload = $validated['image'] ?? null;
        unset($validated['image']);

        if ($upload instanceof UploadedFile) {
            $validated['image'] = $this->imageStorage->store($upload, 'uploads/news');
        }

        News::create($validated);

        return redirect()
            ->route('owner.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news): View
    {
        return view('owner.news.form', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'alpha_dash',
                'max:255',
                Rule::unique('news', 'slug')->ignore($news->id),
            ],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'image' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'File gambar berita harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar berita maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar berita gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar berita maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $upload = $validated['image'] ?? null;
        unset($validated['image']);

        if ($upload instanceof UploadedFile) {
            $previousImage = $news->image;
            $validated['image'] = $this->imageStorage->store($upload, 'uploads/news');
        }

        $news->update($validated);

        if (isset($previousImage)) {
            $this->imageStorage->delete($previousImage);
        }

        return redirect()
            ->route('owner.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $image = $news->image;
        $news->delete();
        $this->imageStorage->delete($image);

        return redirect()
            ->route('owner.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
