<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController
{
    public function index()
    {
        $pelatihan = Pelatihan::all();
        $data = [
            'tittle' => 'Manajeman pelatihan',
            'content' => 'admin.sertifikat.index_pelatihan'
        ];
        return view('admin.layouts.wrapper',$data, compact('pelatihan'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_pelatihan' => 'required|string|max:255|unique:pelatihan,name_pelatihan',
        ]);

        $pelatihan = new Pelatihan();
        $pelatihan->name_pelatihan = $validatedData['name_pelatihan'];
        $pelatihan->save();

        return redirect()->route('sertifikat.index_pelatihan')->with('success', 'pelatihan baru berhasil ditambahkan!');
    }

    public function create()
    {
        $pelatihan = Pelatihan::all();
        $data = [
            'tittle' => 'edit Pelatihan',
            'content' => 'admin.sertifikat.edit_pelatihan'
        ];
        return view('admin.layouts.wrapper', $data, compact('pelatihan'));
    }

    public function edit(Pelatihan $pelatihan)
    {
        $data = [
            'tittle' => 'edit pelatihan',
            'content' => 'admin.sertifikat.edit_pelatihan'
        ];
        return view('admin.layouts.wrapper', $data, compact('pelatihan'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $validatedData = $request->validate([
            'name_pelatihan' => 'required|string|max:255|unique:pelatihan,name_pelatihan,' . $pelatihan->id
        ]);

        $pelatihan->name_pelatihan = $validatedData['name_pelatihan'];
        $pelatihan->save();

        return redirect()->route('sertifikat.index_pelatihan')->with('success', 'pelatihan berhasil diperbarui!');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return redirect()->route('sertifikat.index_pelatihan')->with('success', 'pelatihan berhasil dihapus!');
    }


}
