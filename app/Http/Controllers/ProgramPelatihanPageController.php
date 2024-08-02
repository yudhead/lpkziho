<?php

namespace App\Http\Controllers;

use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;

class ProgramPelatihanPageController
{
    public function index()
    {
        $program_pelatihan_pages = ProgramPelatihan::all();
        $data = [
            'title' => 'Daftar Halaman Program pelatihan',
            'content' => 'admin.program-pelatihan-page.index',
            'program_pelatihan_pages' => $program_pelatihan_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.program-pelatihan-page.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $program_pelatihan_pages = new ProgramPelatihan();
        $program_pelatihan_pages->title = $validatedData['title'];
        $program_pelatihan_pages->content = $validatedData['content'];
        $program_pelatihan_pages->save();

        return redirect()->route('program-pelatihan-page.index')->with('success', 'Halaman Program Pelatihan berhasil disimpan.');
    }

    public function show(ProgramPelatihan $program_pelatihan_pages)
    {
        return view('admin.program-pelatihan-page.show', compact('program_pelatihan_pages'));
    }

    public function edit(ProgramPelatihan $program_pelatihan_pages)
    {
        return view('admin.program-pelathan-page.edit', compact('program_pelatihan_pages'));
    }

    public function update(Request $request, ProgramPelatihan $program_pelatihan_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $program_pelatihan_pages->title = $validatedData['title'];
        $program_pelatihan_pages->content = $validatedData['content'];
        $program_pelatihan_pages->save();

        return redirect()->route('program-pelatihan-page.index')->with('success', 'Halaman Program Pelatihan berhasil diperbarui.');
    }

    public function destroy(ProgramPelatihan $program_pelatihan_pages)
    {
        $program_pelatihan_pages->delete();
        return redirect()->route('program-pelatihan-page.index')->with('success', 'Halaman Program Pelatihan berhasil dihapus.');
    }

    public function getprogrampelatihanPages()
    {

        $program_pelatihan_pages = ProgramPelatihan::ordered()->get();
        return view('programstudi.index', compact('program_pelatihan_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            ProgramPelatihan::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}

