<?php

namespace App\Http\Controllers;

use App\Models\ModulMateri;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ModulMateriController extends Controller
{
    public function index(Request $request)
    {
        $query = ModulMateri::query();

        if ($request->filled('filter_program_studi')) {
            $query->where('kode_program_studi', $request->filter_program_studi);
        }

        $modulMateris = $query->paginate(10); // Menggunakan pagination
        $programStudis = ProgramStudy::all(); // Ambil semua program studi untuk filter dropdown

        return view('admins.materi.index', compact('modulMateris', 'programStudis'));
    }

    public function show($id)
    {
        $materis = ModulMateri::findOrFail($id);
        $file_path = asset('/storage/modul' . $materis->file_path);
        return view('admins.materi.show', compact('materis', 'file_path'));
    }

    public function create()
    {
        $programStudis = ProgramStudy::all();
        return view('admins.materi.create', compact('programStudis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modul' => 'required',
            'judul' => 'required',
            'kode_program_studi' => 'required|exists:tb_program_studi,kode_program_studi',
            'file_path' => 'required|file|max:5120' // Updated to match Surat validation
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/modul', $filename);
        } else {
            return redirect()->back()->withErrors(['file_path' => 'File PDF tidak ditemukan.']);
        }

        ModulMateri::create([
            'modul_pembelajaran' => $request->modul,
            'judul_materi' => $request->judul,
            'kode_program_studi' => $request->kode_program_studi,
            'file_path' => $filename
        ]);

        return redirect()->route('modul_materi.index')->with('success', 'Modul materi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $materis = ModulMateri::findOrFail($id);
        $programStudis = ProgramStudy::all();
        return view('admins.materi.edit', compact('materis', 'programStudis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'modul' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Temukan materi berdasarkan ID
        $materi = ModulMateri::findOrFail($id);

        // Perbarui data materi
        $materi->modul_pembelajaran = $request->input('modul');
        $materi->judul_materi = $request->input('judul');
        $materi->kode_program_studi = $request->input('program');

        // Periksa apakah ada file yang diupload
        if ($request->hasFile('file_path')) {
            // Hapus file yang lama jika ada
            if ($materi->file_path) {
                Storage::delete('public/modul/' . basename($materi->file_path));
            }

            // Simpan file yang baru dengan nama asli
            $file = $request->file('file_path');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/modul', $filename);
            $materi->file_path = $filename;
        }

        // Simpan perubahan ke database
        $materi->save();

        // Redirect atau beri notifikasi
        return redirect()->route('modul_materi.index')->with('success', 'Materi berhasil diperbarui!');
    }




    public function destroy($id)
    {
        $modulMateri = ModulMateri::findOrFail($id);
        $modulMateri->delete();
        return redirect()->route('modul_materi.index')->with('success', 'Modul materi berhasil dihapus');
    }
}
