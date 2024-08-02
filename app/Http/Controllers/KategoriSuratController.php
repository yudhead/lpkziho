<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class KategoriSuratController  extends Controller
{
    public function index()
    {
        $kategori = KategoriSurat::all();
        $data = [
            'tittle' => 'Manajeman Katgeori',
            'content' => 'admin.surat.index_kategori'
        ];
        return view('admin.layouts.wrapper', $data, compact('kategori'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:kategori,name',
            'title' => 'required|string|max:255|unique:kategori,title',
        ]);

        $kategori = new KategoriSurat();
        $kategori->name = $validatedData['name'];
        $kategori->title = $validatedData['title'];
        $kategori->save();

        return redirect()->route('surat.index_kategori')->with('success', 'Kategori baru berhasil ditambahkan!');
    }


    public function create()
    {
        $kategori = KategoriSurat::all();
        $data = [
            'tittle' => 'edit Katgeori',
            'content' => 'admin.surat.edit_kategori'
        ];
        return view('admin.layouts.wrapper', $data, compact('kategori'));
    }


    public function edit(KategoriSurat $kategori)
    {
        $data = [
            'tittle' => 'edit Katgeori',
            'content' => 'admin.surat.edit_kategori'
        ];
        return view('admin.layouts.wrapper', $data, compact('kategori'));
    }

    public function update(Request $request, KategoriSurat $kategori)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:kategori,name,' . $kategori->id,
            'title' => 'required|string|max:255|unique:kategori,title,' . $kategori->id,
        ]);

        $kategori->name = $validatedData['name'];
        $kategori->title = $validatedData['title'];
        $kategori->save();

        return redirect()->route('surat.index_kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(KategoriSurat $kategori)
    {
        $kategori->delete();

        return redirect()->route('surat.index_kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
