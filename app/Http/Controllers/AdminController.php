<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\SiteplanUnit;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
 return view('admin.dashboard', [
        'totalUnit' => SiteplanUnit::count(),
        'dijual'    => SiteplanUnit::where('status','dijual')->count(),
        'booked'    => SiteplanUnit::where('status','booked')->count(),
        'build'     => SiteplanUnit::where('status','build')->count(),
        'dihuni'    => SiteplanUnit::where('status','dihuni')->count(),
        'totalType' => Unit::count(),
        'totalFaq'  => Faq::count(),
    ]);}

}
