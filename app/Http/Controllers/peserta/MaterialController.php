<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\View\View;

class MaterialController extends Controller
{
    public function index(): View
    {
        $materials = Material::query()
            ->where('is_published', true)
            ->latest()
            ->get();

        return view(
            'peserta.materials.index',
            compact('materials')
        );
    }


    public function show(Material $material): View
    {
        abort_unless($material->is_published, 404);

        return view(
            'peserta.materials.show',
            compact('material')
        );
    }
}