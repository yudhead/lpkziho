<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Bakery;

class BakeryPageController extends Controller
{
    public function index()
    {
        $bakery_pages = Bakery::all();
        $data = [
            'title' => 'Daftar Halaman Bakery',
            'content' => 'admin.bakery-page.index',
            'bakery_pages' => $bakery_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.bakery-page.create');
    }

    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);


        $bakery_pages = new Bakery();
        $bakery_pages->title = $validatedData['title'];
        $bakery_pages->content = $validatedData['content'];

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('fotopagebakery', 'public');
            $bakery_pages->foto = $filePath;
        }


        $bakery_pages->save();

        return redirect()->route('bakery-page.index')->with('success', 'Halaman Bakery berhasil disimpan.');
    }


    public function show(Bakery $bakery_pages)
    {
        return view('admin.bakery-page.show', compact('bakery_pages'));
    }

    public function edit(Bakery $bakery_pages)
    {
        return view('admin.bakery-page.edit', compact('bakery_pages'));
    }

    public function update(Request $request, Bakery $bakery_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $bakery_pages->title = $validatedData['title'];
        $bakery_pages->content = $validatedData['content'];
        if ($request->hasFile('foto')) {
            // Delete the old file
            if ($bakery_pages->foto) {
                Storage::delete($bakery_pages->foto);
            }

            // Upload the new file
            $filePath = $request->file('foto')->store('fotopagebakery', 'public');
            $bakery_pages->foto = $filePath;
        }
        $bakery_pages->save();

        return redirect()->route('bakery-page.index')->with('success', 'Halaman Bakery berhasil diperbarui.');
    }

    public function destroy(Bakery $bakery_pages)
    {
        $bakery_pages->delete();
        return redirect()->route('bakery-page.index')->with('success', 'Halaman Bakery berhasil dihapus.');
    }

    public function getbakeryPages()
    {

        $bakery_pages = Bakery::ordered()->get();
        return view('programstudi.bakery', compact('bakery_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Bakery::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

}
