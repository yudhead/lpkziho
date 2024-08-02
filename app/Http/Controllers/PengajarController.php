<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajar = Pengajar::all(); // Mengambil semua data pengajar
        return view('admins.pengajar', compact('pengajar'));
    }

    public function edit($NIK)
    {
        $pengajar = Pengajar::findOrFail($NIK); // Ambil data pengajar berdasarkan NIK
        $program_studies = ProgramStudy::all(); // Ambil semua data program studi
        return view('admins.create-pengajar', compact('pengajar', 'program_studies'));
    }

    public function destroy($NIK)
    {
        $pengajar = Pengajar::findOrFail($NIK);
        $pengajar->delete();

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil dihapus');
    }

    public function create()
    {
        $program_studies = ProgramStudy::all(); // Mengambil semua data program studi
        return view('admins.create-pengajar', compact('program_studies'));
    }

    public function update(Request $request, $NIK)
    {
        $request->validate([
            'nama_pengajar' => 'required|string|max:255',
            'nama_program_studi' => 'required|string|max:50'
        ]);

        $pengajar = Pengajar::findOrFail($NIK);
        $pengajar->nama_pengajar = $request->nama_pengajar;
        $pengajar->nama_program_studi = $request->nama_program_studi;
        $pengajar->save();

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required|numeric|unique:tb_pengajar',
            'nama_pengajar' => 'required|string|max:255',
            'nama_program_studi' => 'required|string|max:50' // Menggunakan nama_program_studi
        ]);
    
        // Membuat instance pengajar baru
        $pengajar = new Pengajar();
        $pengajar->NIK = $request->NIK;
        $pengajar->nama_pengajar = $request->nama_pengajar;
        $pengajar->nama_program_studi = $request->nama_program_studi; // Menyimpan nama_program_studi
    
        // Menyimpan data ke database
        $pengajar->save();
    
        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil ditambahkan');
    }
}
