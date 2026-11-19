<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('owner.dashboard', [
            'activityCount' => Activity::count(),
            'newsCount' => News::count(),
            'galleryCount' => Gallery::count(),
            'recentActivities' => Activity::query()->orderByDesc('date')->limit(5)->get(),
            'recentNews' => News::query()->orderByDesc('created_at')->limit(5)->get(),
        ]);
    }
}
