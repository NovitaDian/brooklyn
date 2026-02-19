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

        // Pastikan folder unit ada di public_html
        $tujuan = $_SERVER['DOCUMENT_ROOT'] . '/unit';

        if (!file_exists($tujuan)) {
            mkdir($tujuan, 0755, true);
        }

        // ====== UPLOAD FOTO UTAMA ======
        $namaFoto = null;

        if ($r->hasFile('foto')) {
            $file = $r->file('foto');
            $namaFoto = time() . '_foto_' . $file->getClientOriginalName();
            $file->move($tujuan, $namaFoto);
        }

        // ====== SIMPAN DATA UNIT ======
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
            'foto' => $namaFoto,
        ]);

        // ====== UPLOAD GALLERY ======
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {

                $namaGallery = time() . '_gallery_' . $img->getClientOriginalName();

                $img->move($tujuan, $namaGallery);

                UnitImage::create([
                    'unit_id' => $unit->id,
                    'image' => $namaGallery
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
            'foto' => 'image',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $tujuan = $_SERVER['DOCUMENT_ROOT'] . '/unit';

        if (!file_exists($tujuan)) {
            mkdir($tujuan, 0755, true);
        }

        // ====== UPDATE FOTO UTAMA ======
        $namaFoto = $unit->foto;

        if ($r->hasFile('foto')) {

            // hapus foto lama kalau ada
            if ($unit->foto && file_exists($tujuan . '/' . $unit->foto)) {
                unlink($tujuan . '/' . $unit->foto);
            }

            $file = $r->file('foto');
            $namaFoto = time() . '_foto_' . $file->getClientOriginalName();
            $file->move($tujuan, $namaFoto);
        }

        // ====== UPDATE DATA ======
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
            'harga' => str_replace('.', '', $r->harga),
            'foto' => $namaFoto,
        ]);

        // ====== TAMBAH GALLERY BARU ======
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {

                $namaGallery = time() . '_gallery_' . $img->getClientOriginalName();

                $img->move($tujuan, $namaGallery);

                UnitImage::create([
                    'unit_id' => $unit->id,
                    'image' => $namaGallery
                ]);
            }
        }

        return redirect('/admin/units')
            ->with('success', 'Unit berhasil diupdate');
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
