<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Services\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function edit(): View
    {
        $about = AboutPage::query()->find(1)?->content ?? config('tbm.about');
        $about['images'] = array_merge(config('tbm.about.images'), $about['images'] ?? []);

        return view('owner.about.edit', [
            'about' => $about,
            'imageUrls' => [
                'logo' => $this->imageStorage->url($about['images']['logo']),
                'biography' => $this->imageStorage->url($about['images']['biography']),
            ],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $content = $request->validate([
            'hero.eyebrow' => ['required', 'string', 'max:100'],
            'hero.title' => ['required', 'string', 'max:255'],
            'hero.name' => ['required', 'string', 'max:255'],
            'hero.description' => ['required', 'string', 'max:2000'],
            'overview.label' => ['required', 'string', 'max:100'],
            'overview.title_prefix' => ['required', 'string', 'max:255'],
            'overview.title_highlight' => ['required', 'string', 'max:255'],
            'overview.paragraphs' => ['required', 'array', 'min:1', 'max:10'],
            'overview.paragraphs.*' => ['required', 'string', 'max:2000'],
            'biography.section_title' => ['required', 'string', 'max:255'],
            'biography.name' => ['required', 'string', 'max:255'],
            'biography.summary' => ['required', 'string', 'max:2000'],
            'biography.person_name' => ['required', 'string', 'max:255'],
            'biography.role' => ['required', 'string', 'max:255'],
            'biography.label' => ['required', 'string', 'max:100'],
            'biography.title' => ['required', 'string', 'max:255'],
            'biography.paragraphs' => ['required', 'array', 'min:1', 'max:10'],
            'biography.paragraphs.*' => ['required', 'string', 'max:3000'],
            'biography.highlight_title' => ['required', 'string', 'max:255'],
            'biography.highlight_content' => ['required', 'string', 'max:2000'],
            'vision.title' => ['required', 'string', 'max:255'],
            'vision.content' => ['required', 'string', 'max:3000'],
            'mission.title' => ['required', 'string', 'max:255'],
            'mission.items' => ['required', 'array', 'min:1', 'max:20'],
            'mission.items.*' => ['required', 'string', 'max:2000'],
            'history.title' => ['required', 'string', 'max:255'],
            'history.description' => ['required', 'string', 'max:2000'],
            'history.items' => ['required', 'array', 'min:1', 'max:50'],
            'history.items.*.year' => ['required', 'string', 'max:50'],
            'history.items.*.title' => ['required', 'string', 'max:255'],
            'history.items.*.description' => ['required', 'string', 'max:3000'],
            'values.title' => ['required', 'string', 'max:255'],
            'values.description' => ['required', 'string', 'max:2000'],
            'values.items' => ['required', 'array', 'min:1', 'max:20'],
            'values.items.*.title' => ['required', 'string', 'max:255'],
            'values.items.*.description' => ['required', 'string', 'max:2000'],
            'cta.title' => ['required', 'string', 'max:255'],
            'cta.description' => ['required', 'string', 'max:2000'],
            'images.logo' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'images.biography' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
        ], [
            'images.logo.image' => 'File logo harus berupa gambar yang valid.',
            'images.logo.max' => 'Ukuran file logo maksimal 10 MB.',
            'images.logo.uploaded' => 'Upload logo gagal atau ukuran file melebihi 10 MB.',
            'images.logo.dimensions' => 'Dimensi logo maksimal 6000 x 6000 piksel.',
            'images.biography.image' => 'File foto biografi harus berupa gambar yang valid.',
            'images.biography.max' => 'Ukuran foto biografi maksimal 10 MB.',
            'images.biography.uploaded' => 'Upload foto biografi gagal atau ukuran file melebihi 10 MB.',
            'images.biography.dimensions' => 'Dimensi foto biografi maksimal 6000 x 6000 piksel.',
        ]);

        $aboutPage = AboutPage::query()->find(1);
        $existingImages = array_merge(
            config('tbm.about.images'),
            $aboutPage?->content['images'] ?? [],
        );
        $uploads = $content['images'] ?? [];
        unset($content['images']);

        foreach (['overview.paragraphs', 'biography.paragraphs', 'mission.items', 'history.items', 'values.items'] as $path) {
            data_set($content, $path, array_values(data_get($content, $path)));
        }

        foreach (['logo', 'biography'] as $imageKey) {
            $upload = $uploads[$imageKey] ?? null;

            if ($upload instanceof UploadedFile) {
                $content['images'][$imageKey] = $this->imageStorage->store($upload, 'uploads/about');
            } else {
                $content['images'][$imageKey] = $existingImages[$imageKey];
            }
        }

        $aboutPage ??= new AboutPage;
        $aboutPage->id = 1;
        $aboutPage->content = $content;
        $aboutPage->save();

        foreach (['logo', 'biography'] as $imageKey) {
            if ($existingImages[$imageKey] !== $content['images'][$imageKey]) {
                $this->imageStorage->delete($existingImages[$imageKey]);
            }
        }

        return redirect()
            ->route('owner.about.edit')
            ->with('success', 'Konten halaman Tentang berhasil diperbarui.');
    }
}
