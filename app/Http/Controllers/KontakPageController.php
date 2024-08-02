<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class KontakPageController extends Controller
{
    public function index()
    {
        $kontak_pages = Kontak::all();
        $data = [
            'title' => 'Daftar Halaman Kontak',
            'content' => 'admin.kontak-page.index',
            'kontak_pages' => $kontak_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.kontak-page.create');
    }

    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);


        $kontak_pages = new Kontak();
        $kontak_pages->title = $validatedData['title'];
        $kontak_pages->content = $validatedData['content'];

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('fotopagekontak', 'public');
            $kontak_pages->foto = $filePath;
        }


        $kontak_pages->save();

        return redirect()->route('kontak-page.index')->with('success', 'Halaman kontak berhasil disimpan.');
    }


    public function show(Kontak $kontak_pages)
    {
        return view('admin.kontak-page.show', compact('kontak_pages'));
    }

    public function edit(Kontak $kontak_pages)
    {
        return view('admin.kontak-page.edit', compact('kontak_pages'));
    }

    public function update(Request $request, kontak $kontak_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $kontak_pages->title = $validatedData['title'];
        $kontak_pages->content = $validatedData['content'];
        if ($request->hasFile('foto')) {
            // Delete the old file
            if ($kontak_pages->foto) {
                Storage::delete($kontak_pages->foto);
            }

            // Upload the new file
            $filePath = $request->file('foto')->store('fotopagekontak', 'public');
            $kontak_pages->foto = $filePath;
        }
        $kontak_pages->save();

        return redirect()->route('kontak-page.index')->with('success', 'Halaman Kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak_pages)
    {
        $kontak_pages->delete();
        return redirect()->route('kontak-page.index')->with('success', 'Halaman Kontak berhasil dihapus.');
    }

    public function getkontakPages()
    {

        $kontak_pages = Kontak::ordered()->get();
        return view('kontak.index', compact('kontak_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Kontak::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

}
