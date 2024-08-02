<?php

namespace App\Http\Controllers;

use App\Models\JenisUjian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JenisUjianController extends Controller
{
    public function index()
    {
        $jenisUjian = JenisUjian::paginate(10);
        return view('admin.jenis_ujian.index', compact('jenisUjian'));
    }

    public function create(JenisUjian $jenisUjian = null)
    {
        return view('admin.jenis_ujian.create', compact('jenisUjian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
        ]);

        JenisUjian::create([
            'nama_ujian' => $request->nama_ujian,
        ]);

        return redirect()->route('jenis_ujian.index')->with('success', 'Jenis ujian berhasil ditambahkan');
    }

    public function edit(JenisUjian $jenisUjian)
    {
        return view('admin.jenis_ujian.create', compact('jenisUjian'));
    }

    public function update(Request $request, JenisUjian $jenisUjian)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
        ]);

        $jenisUjian->update([
            'nama_ujian' => $request->nama_ujian,
        ]);

        return redirect()->route('jenis_ujian.index')->with('success', 'Jenis ujian berhasil diperbarui');
    }

    public function destroy(JenisUjian $jenisUjian)
    {
        $jenisUjian->delete();

        return redirect()->route('jenis_ujian.index')->with('success', 'Jenis ujian berhasil dihapus');
    }
}
