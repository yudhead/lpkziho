<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Routing\Controller;
use App\Models\Kategori; // Pastikan menggunakan nama model dengan huruf kapital

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::with('kategori')->get();
        $kategori = Kategori::all();
        $data = [
            'tittle' => 'Manajeman Surat',
            'content' => 'admin.surat.index'
        ];
        return view('admin.layouts.wrapper', $data, compact('surats', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::pluck('name', 'id');
        $data = [
            'tittle' => 'Tambah Surat',
            'content' => 'admin.surat.create'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat', $filename);
        } else {
            return redirect()->back()->withErrors(['file_surat' => 'File surat tidak ditemukan.']);
        }

        $surat = new Surat();
        $surat->nomor_surat = $validatedData['nomor_surat'];
        $surat->id_kategori = $validatedData['id_kategori'];
        $surat->judul = $validatedData['judul'];
        $surat->tujuan = $validatedData['tujuan'];
        $surat->file_surat = $filename;

        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil disimpan!');
    }



    public function show(Surat $surat)
    {
         $data = [
            'tittle' => 'Tambah Surat',
            'content' => 'admin.surat.show'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'surat'));
    }


    public function edit(Surat $surat)
    {
        $kategori = Kategori::pluck('name', 'id');
        $data = [
            'tittle' => 'Edit Surat',
            'content' => 'admin.surat.edit'
        ];
        return view('admin.layouts.wrapper', $data, compact( 'surat','kategori'));
    }

    public function update(Request $request, Surat $surat)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf',
        ]);

        $surat->nomor_surat = $validatedData['nomor_surat'];
        $surat->id_kategori = $validatedData['id_kategori'];
        $surat->judul = $validatedData['judul'];
        $surat->tujuan = $validatedData['tujuan'];

        if ($request->hasFile('file_surat')) {
            // Check if old file exists and delete it
            if (Storage::disk('public')->exists('surat/' . $surat->file_surat)) {
                Storage::disk('public')->delete('surat/' . $surat->file_surat);
            }

            // Store new file
            $file = $request->file('file_surat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat', $filename);
            $surat->file_surat = $filename;
        }

        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui!');
    }


    public function destroy(Surat $surat)
    {
        if (Storage::disk('public')->exists('surat/' . $surat->file_surat)) {
            Storage::disk('public')->delete('surat/' . $surat->file_surat);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus!');
    }
}
