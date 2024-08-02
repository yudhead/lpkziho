<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Sertifikat;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertifikatController
{
    public function index()
    {

        $sertifikat = Sertifikat::with('pelatihan')->get();
        $pelatihan = Pelatihan::all();
        $data = [
            'tittle' => 'Manajeman Sertifikat',
            'content' => 'admin.sertifikat.index'
        ];
        return view('admin.layouts.wrapper', $data, compact('sertifikat','pelatihan'));
    }


    public function create()
    {
        $pelatihan = Pelatihan::pluck('name_pelatihan', 'id');
        $data = [
            'tittle' => 'Unggah Sertifikat',
            'content' => 'admin.sertifikat.create'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'pelatihan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_sertifikat' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'id_pelatihan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'nomor_urut' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'file_sertifikat' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('file_sertifikat')) {
            $file = $request->file('file_sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/sertifikat', $filename);
        } else {
            return redirect()->back()->withErrors(['file_sertifikat' => 'File sertifikat tidak ditemukan.']);
        }

        $sertifikat = new Sertifikat();
        $sertifikat->nomor_sertifikat = $validatedData['nomor_sertifikat'];
        $sertifikat->periode = $validatedData['periode'];
        $sertifikat->id_pelatihan = $validatedData['id_pelatihan'];
        $sertifikat->lokasi = $validatedData['lokasi'];
        $sertifikat->nomor_urut = $validatedData['nomor_urut'];
        $sertifikat->nama = $validatedData['nama'];
        $sertifikat->file_sertifikat = $filename;

        $sertifikat->save();

        return redirect()->route('sertifikat.index')->with('success', 'sertifikat berhasil disimpan!');
    }

    public function destroy(Sertifikat $sertifikat)
    {
        if (Storage::disk('public')->exists('sertifikat/' . $sertifikat->file_sersertifikat)) {
            Storage::disk('public')->delete('sertifikat/' . $sertifikat->file_sersertifikat);
        }

        $sertifikat->delete();

        return redirect()->route('sertifikat.index')->with('success', 'Surat berhasil dihapus!');
    }

    public function show(Sertifikat $sertifikat)
    {
         $data = [
            'tittle' => 'Lihat Sertifikat',
            'content' => 'admin.Sertifikat.show'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'sertifikat'));
    }


    public function edit(Sertifikat $sertifikat)
    {
        $pelatihan = Pelatihan::pluck('name_pelatihan', 'id');
        $data = [
            'tittle' => 'Edit Sertifikat',
            'content' => 'admin.sertifikat.edit'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'sertifikat','pelatihan'));
    }

    public function update(Request $request, Sertifikat $sertifikat)
{
    $validatedData = $request->validate([
        'nomor_sertifikat' => 'required|string|max:255',
        'periode' => 'required|string|max:255',
        'id_pelatihan' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'nomor_urut' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'file_sertifikat' => 'nullable|file|mimes:pdf',
    ]);

    // Update the existing Sertifikat instance
    $sertifikat->nomor_sertifikat = $validatedData['nomor_sertifikat'];
    $sertifikat->periode = $validatedData['periode'];
    $sertifikat->id_pelatihan = $validatedData['id_pelatihan'];
    $sertifikat->lokasi = $validatedData['lokasi'];
    $sertifikat->nomor_urut = $validatedData['nomor_urut'];
    $sertifikat->nama = $validatedData['nama'];

    if ($request->hasFile('file_sertifikat')) {
        // Check if old file exists and delete it
        if (Storage::disk('public')->exists('sertifikat/' . $sertifikat->file_sertifikat)) {
            Storage::disk('public')->delete('sertifikat/' . $sertifikat->file_sertifikat);
        }

        // Store new file
        $file = $request->file('file_sertifikat');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/sertifikat', $filename);
        $sertifikat->file_sertifikat = $filename;
    }

    $sertifikat->save();

    return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil diperbarui!');
}

}
