<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitImage;
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
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // helper upload biar rapi
        $upload = function ($field) use ($r) {

            if ($r->hasFile($field)) {

                $file = $r->file($field);

                $namaFile = time() . '_' . $field . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('unit'), $namaFile);

                return $namaFile;
            }

            return null;
        };


        // ✅ 1. Simpan unit dulu
        $unit = Unit::create([
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
            'harga' => str_replace('.', '', $r->harga),

            'foto' => $upload('foto'),
            'denah' => $upload('denah'),
        ]);

        // ✅ 2. Simpan gallery unlimited
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {

                $path = $img->store('units', 'public');

                UnitImage::create([
                    'unit_id' => $unit->id,
                    'image' => $path
                ]);
            }
        }

        return redirect('/admin/units')
            ->with('success', 'Unit berhasil ditambahkan');
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

        $r->validate([
            'nama' => 'required',
            'luas_tanah' => 'required',
            'luas_bangunan' => 'required',
            'kt' => 'required',
            'km' => 'required',
        ]);

        // ================= UPDATE FOTO =================
        $upload = function ($field, $oldFile = null) use ($r) {
            if ($r->hasFile($field)) {

                // hapus file lama
                if ($oldFile && \Storage::disk('public')->exists($oldFile)) {
                    \Storage::disk('public')->delete($oldFile);
                }

                return $r->file($field)->store('unit', 'public');
            }
            return $oldFile;
        };

        // ================= UPDATE DATA UNIT =================
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

            'foto' => $upload('foto', $unit->foto),
            'denah' => $upload('denah', $unit->denah),
        ]);

        // ================= HAPUS INTERIOR =================
        if ($r->delete_images) {
            foreach ($r->delete_images as $imgId) {

                $img = UnitImage::find($imgId);

                if ($img) {
                    if (\Storage::disk('public')->exists($img->image)) {
                        \Storage::disk('public')->delete($img->image);
                    }

                    $img->delete();
                }
            }
        }

        // ================= TAMBAH INTERIOR =================
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {

                $path = $img->store('units', 'public');

                UnitImage::create([
                    'unit_id' => $unit->id,
                    'image' => $path
                ]);
            }
        }

        return redirect('/admin/units')->with('success', 'Unit berhasil diupdate');
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
        $unit = Unit::with('images')->findOrFail($id);
        return view('admin.units.detail', compact('unit'));
    }
}
