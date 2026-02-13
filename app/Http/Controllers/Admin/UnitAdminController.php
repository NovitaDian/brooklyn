<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class UnitAdminController extends Controller
{
    // ================== LIST DATA ==================
    public function index()
    {
        $units = Unit::latest()->get();
        return view('admin.units.index', compact('units'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        return view('admin.units.create');
    }

    // ================== SIMPAN DATA ==================
    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'luas_tanah' => 'required',
            'luas_bangunan' => 'required',
            'kt' => 'required',
            'km' => 'required',
            'foto' => 'required|image',
        ]);

        // function kecil biar rapi
        $upload = function ($field) use ($r) {
            return $r->hasFile($field)
                ? $r->file($field)->store('unit', 'public')
                : null;
        };

        Unit::create([
            'nama' => $r->nama,
            'luas_tanah' => $r->luas_tanah,
            'luas_bangunan' => $r->luas_bangunan,
            'kt' => $r->kt,
            'km' => $r->km,
            'listrik' => $r->listrik,
            'air' => $r->air,
            'lantai' => $r->lantai,
            'atap' => $r->atap,
            'dinding' => $r->dinding,
            'plafon' => $r->plafon,
            'kusen' => $r->kusen,
            'sanitary' => $r->sanitary,
            'pintu' => $r->pintu,
            'jendela' => $r->jendela,

            'foto' => $upload('foto'),
            'denah' => $upload('denah'),
            'detail1' => $upload('detail1'),
            'detail2' => $upload('detail2'),
            'detail3' => $upload('detail3'),
            'detail4' => $upload('detail4'),
            'detail5' => $upload('detail5'),
            'detail6' => $upload('detail6'),
        ]);

        return redirect('/admin/units')->with('success', 'Unit berhasil ditambahkan');
    }

    // ================== FORM EDIT ==================
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('admin.units.edit', compact('unit'));
    }

    // ================== UPDATE DATA ==================
    public function update(Request $r, $id)
    {
        $unit = Unit::findOrFail($id);

        $upload = function ($field) use ($r, $unit) {
            if ($r->hasFile($field)) {
                // hapus lama
                if ($unit->$field) {
                    Storage::disk('public')->delete($unit->$field);
                }
                return $r->file($field)->store('unit', 'public');
            }
            return $unit->$field; // tetap pakai yang lama
        };

        $unit->update([
            'nama' => $r->nama,
            'luas_tanah' => $r->luas_tanah,
            'luas_bangunan' => $r->luas_bangunan,
            'kt' => $r->kt,
            'km' => $r->km,
            'listrik' => $r->listrik,
            'air' => $r->air,
            'lantai' => $r->lantai,
            'atap' => $r->atap,
            'dinding' => $r->dinding,
            'plafon' => $r->plafon,
            'kusen' => $r->kusen,
            'sanitary' => $r->sanitary,
            'pintu' => $r->pintu,
            'jendela' => $r->jendela,

            'foto' => $upload('foto'),
            'denah' => $upload('denah'),
            'detail1' => $upload('detail1'),
            'detail2' => $upload('detail2'),
            'detail3' => $upload('detail3'),
            'detail4' => $upload('detail4'),
            'detail5' => $upload('detail5'),
            'detail6' => $upload('detail6'),
        ]);

        return redirect()->route('admin.units.index')->with('success', 'Unit berhasil diupdate');
    }


    // ================== HAPUS DATA ==================
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        if ($unit->foto && Storage::exists('public/' . $unit->foto)) {
            Storage::delete('public/' . $unit->foto);
        }

        $unit->delete();

        return redirect()->route('admin.units.index')
            ->with('success', 'Unit berhasil dihapus');
    }
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('admin.units.detail', compact('unit'));
    }
}
