<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::query()
            ->where('is_active', true)
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->get();

        return view('gallery.index', compact('galleries'));
    }
}