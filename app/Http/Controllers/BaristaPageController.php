<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Barista;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BaristaPageController extends Controller
{
    public function index()
    {
        $barista_pages = Barista::all();
        $data = [
            'title' => 'Daftar Halaman Barista',
            'content' => 'admin.barista-page.index',
            'barista_pages' => $barista_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.barista-page.create');
    }

    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);


        $barista_pages = new Barista();
        $barista_pages->title = $validatedData['title'];
        $barista_pages->content = $validatedData['content'];

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('fotopagebarista', 'public');
            $barista_pages->foto = $filePath;
        }


        $barista_pages->save();

        return redirect()->route('barista-page.index')->with('success', 'Halaman Barista berhasil disimpan.');
    }


    public function show(Barista $barista_pages)
    {
        return view('admin.barista-page.show', compact('barista_pages'));
    }

    public function edit(Barista $barista_pages)
    {
        return view('admin.barista-page.edit', compact('barista_pages'));
    }

    public function update(Request $request, Barista $barista_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',        ]);

        $barista_pages->title = $validatedData['title'];
        $barista_pages->content = $validatedData['content'];
        if ($request->hasFile('foto')) {
            // Delete the old file
            if ($barista_pages->foto) {
                Storage::delete($barista_pages->foto);
            }

            // Upload the new file
            $filePath = $request->file('foto')->store('fotopagebarista', 'public');
            $barista_pages->foto = $filePath;
        }
        $barista_pages->save();

        return redirect()->route('barista-page.index')->with('success', 'Halaman Barista berhasil diperbarui.');
    }

    public function destroy(Barista $barista_pages)
    {
        $barista_pages->delete();
        return redirect()->route('barista-page.index')->with('success', 'Halaman Barista berhasil dihapus.');
    }

    public function getBaristaPages()
    {

        $barista_pages = Barista::ordered()->get();
        return view('programstudi.barista', compact('barista_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Barista::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

}
