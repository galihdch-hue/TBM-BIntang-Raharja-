<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Activity::query()
            ->where('is_active', true)
            ->orderBy('date')
            ->orderBy('start_time');


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date')) {

            $query->whereDate(
                'date',
                $request->date
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER KATEGORI
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where(
                'category',
                $request->category
            );
        }


        $activities = $query->get();


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        $categories = Activity::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');


        return view(
            'peserta.schedule.index',
            compact(
                'activities',
                'categories'
            )
        );
    }


    public function show(Activity $activity): View
    {
        abort_unless(
            $activity->is_active,
            404
        );


        return view(
            'peserta.schedule.show',
            compact('activity')
        );
    }
}