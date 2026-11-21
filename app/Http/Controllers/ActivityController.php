<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\ImageStorage;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        $activities = Activity::where('is_active', true)
            ->orderBy('date', 'asc')
            ->get();

        foreach ($activities as $activity) {
            $this->setInstructorImageUrl($activity);
        }

        return view('activities.index', ['activities' => $activities]);
    }

    public function show(Activity $activity): View
    {
        $this->setInstructorImageUrl($activity);

        return view('activities.show', compact('activity'));
    }

    private function setInstructorImageUrl(Activity $activity): void
    {
        $imagePath = $activity->instructor_photo ?: $activity->instructor_image;

        if ($activity->instructor_photo === null
            && $imagePath !== null
            && ! file_exists(public_path($imagePath))) {
            $imagePath = null;
        }

        $activity->setAttribute(
            'instructor_image_url',
            $this->imageStorage->url($imagePath),
        );
    }
}
