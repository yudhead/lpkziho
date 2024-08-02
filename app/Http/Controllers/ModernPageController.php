<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Modern;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ModernPageController extends Controller
{
    public function index()
    {
        $modern_pages = Modern::all();
        $data = [
            'title' => 'Daftar Halaman Modern',
            'content' => 'admin.modern-page.index',
            'modern_pages' => $modern_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.modern-page.create');
    }

    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);


        $modern_pages = new Modern();
        $modern_pages->title = $validatedData['title'];
        $modern_pages->content = $validatedData['content'];

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('fotopagemodern', 'public');
            $modern_pages->foto = $filePath;
        }


        $modern_pages->save();

        return redirect()->route('modern-page.index')->with('success', 'Halaman modern berhasil disimpan.');
    }


    public function show(Modern $modern_pages)
    {
        return view('admin.modern-page.show', compact('modern_pages'));
    }

    public function edit(Modern $modern_pages)
    {
        return view('admin.modern-page.edit', compact('modern_pages'));
    }

    public function update(Request $request, Modern $modern_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $modern_pages->title = $validatedData['title'];
        $modern_pages->content = $validatedData['content'];
        if ($request->hasFile('foto')) {
            // Delete the old file
            if ($modern_pages->foto) {
                Storage::delete($modern_pages->foto);
            }

            // Upload the new file
            $filePath = $request->file('foto')->store('fotopagemodern', 'public');
            $modern_pages->foto = $filePath;
        }
        $modern_pages->save();

        return redirect()->route('modern-page.index')->with('success', 'Halaman modern berhasil diperbarui.');
    }

    public function destroy(Modern $modern_pages)
    {
        $modern_pages->delete();
        return redirect()->route('modern-page.index')->with('success', 'Halaman modern berhasil dihapus.');
    }

    public function getmodernPages()
    {

        $modern_pages = Modern::ordered()->get();
        return view('programstudi.modern', compact('modern_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Modern::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

}

