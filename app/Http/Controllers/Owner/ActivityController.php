<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Services\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        return view('owner.activities.index', [
            'activities' => Activity::query()->orderByDesc('date')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('owner.activities.form', [
            'activity' => new Activity,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'instructor' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'is_active' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'File gambar kegiatan harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar kegiatan maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar kegiatan gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar kegiatan maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $upload = $validated['image'] ?? null;
        unset($validated['image']);

        if ($upload instanceof UploadedFile) {
            $validated['image'] = $this->imageStorage->store($upload, 'uploads/activities');
        }

        Activity::create($validated);

        return redirect()
            ->route('owner.activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity): View
    {
        return view('owner.activities.form', compact('activity'));
    }

    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'instructor' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'is_active' => ['sometimes', 'boolean'],
        ], [
            'image.image' => 'File gambar kegiatan harus berupa gambar yang valid.',
            'image.max' => 'Ukuran gambar kegiatan maksimal 10 MB.',
            'image.uploaded' => 'Upload gambar kegiatan gagal atau ukuran file melebihi 10 MB.',
            'image.dimensions' => 'Dimensi gambar kegiatan maksimal 6000 x 6000 piksel.',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $upload = $validated['image'] ?? null;
        unset($validated['image']);

        if ($upload instanceof UploadedFile) {
            $previousImage = $activity->image;
            $validated['image'] = $this->imageStorage->store($upload, 'uploads/activities');
        }

        $activity->update($validated);

        if (isset($previousImage)) {
            $this->imageStorage->delete($previousImage);
        }

        return redirect()
            ->route('owner.activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $image = $activity->image;
        $activity->delete();
        $this->imageStorage->delete($image);

        return redirect()
            ->route('owner.activities.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
