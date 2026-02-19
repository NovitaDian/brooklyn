<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

        // function upload ke public
        $upload = function ($field) use ($r) {

            if ($r->hasFile($field)) {

                $file = $r->file($field);

                $namaFile = time() . '_' . $field . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('unit'), $namaFile);

                return $namaFile; // simpan nama file saja ke database
            }

            return null;
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



    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
