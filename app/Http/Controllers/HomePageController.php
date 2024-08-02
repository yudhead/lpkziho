<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $home_pages = Home::all();
        $data = [
            'title' => 'Daftar Halaman home',
            'content' => 'admin.home-page.index',
            'home_pages' => $home_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.home-page.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $home_page = new Home();
        $home_page->title = $validatedData['title'];
        $home_page->content = $validatedData['content'];
        $home_page->save();

        return redirect()->route('home-page.index')->with('success', 'Halaman home berhasil disimpan.');
    }

    public function show(Home $home_page)
    {
        return view('admin.home-page.show', compact('home_page'));
    }

    public function edit(Home $home_page)
    {
        return view('admin.home-page.edit', compact('home_page'));
    }

    public function update(Request $request, Home $home_page)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $home_page->title = $validatedData['title'];
        $home_page->content = $validatedData['content'];
        $home_page->save();

        return redirect()->route('home-page.index')->with('success', 'Halaman home berhasil diperbarui.');
    }

    public function destroy(Home $home_page)
    {
        $home_page->delete();
        return redirect()->route('home-page.index')->with('success', 'Halaman home berhasil dihapus.');
    }

    public function gethomePages()
    {
        $home_pages = Home::ordered()->get();
        return view('dashboard.index', compact('home_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
        Home::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
