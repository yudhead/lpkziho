<?php

namespace App\Http\Controllers;

use App\Models\InformasiPage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InformasiPageController extends Controller
{
    public function index()
    {
        $informasi_pages = InformasiPage::all();
        $data = [
            'title' => 'Daftar Halaman Informasi',
            'content' => 'admin.informasi-page.index',
            'informasi_pages' => $informasi_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.informasi-page.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $informasi_page = new InformasiPage();
        $informasi_page->title = $validatedData['title'];
        $informasi_page->content = $validatedData['content'];
        $informasi_page->save();

        return redirect()->route('informasi-page.index')->with('success', 'Halaman informasi berhasil disimpan.');
    }

    public function show(InformasiPage $informasi_page)
    {
        return view('admin.informasi-page.show', compact('informasi_page'));
    }

    public function edit(InformasiPage $informasi_page)
    {
        return view('admin.informasi-page.edit', compact('informasi_page'));
    }

    public function update(Request $request, InformasiPage $informasi_page)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $informasi_page->title = $validatedData['title'];
        $informasi_page->content = $validatedData['content'];
        $informasi_page->save();

        return redirect()->route('informasi-page.index')->with('success', 'Halaman informasi berhasil diperbarui.');
    }

    public function destroy(InformasiPage $informasi_page)
    {
        $informasi_page->delete();
        return redirect()->route('informasi-page.index')->with('success', 'Halaman informasi berhasil dihapus.');
    }

    public function getInformasiPages()
    {
        $informasi_pages = InformasiPage::ordered()->get();
        return view('informasi.informasi', compact('informasi_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
        InformasiPage::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
