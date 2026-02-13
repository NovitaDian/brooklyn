<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteplanUnit;

class SiteplanController extends Controller
{
    public function index()
    {
        $points = SiteplanUnit::all();
       

        return view('admin.siteplan.index', compact('points'));
    }

    public function store(Request $request)
    {
        SiteplanUnit::create($request->all());
        return back()->with('success', 'Titik berhasil disimpan');
    }
    public function destroy($id)
{
    SiteplanUnit::findOrFail($id)->delete();
    return back()->with('success','Titik berhasil dihapus');
}


}
