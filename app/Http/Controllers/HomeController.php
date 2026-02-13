<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\SiteplanUnit;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        $points = SiteplanUnit::all();
        $totalKavling = 74;

        $dijual = SiteplanUnit::where('status', 'dijual')->count();
        $booked = SiteplanUnit::where('status', 'booked')->count();
        $build  = SiteplanUnit::where('status', 'build')->count();
        $dihuni = SiteplanUnit::where('status', 'dihuni')->count();

        $ready = 74 - ($dijual + $booked + $build + $dihuni);

        $progress = [
            'total'  => $totalKavling,
            'ready'  => $ready,
            'dijual' => $dijual,
            'booked' => $booked,
            'build'  => $build,
            'dihuni' => $dihuni,

        ];
        $faqs = Faq::where('is_active', 1)->orderBy('order')->get();



        return view('home', compact('units', 'points', 'progress', 'faqs'));
    }

    public function detail($id)
    {
        return view('detail');
    }
}
