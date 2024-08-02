<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\InformasiPage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'content' => 'admin.dashboard.index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    // public function index()
    // {
    //     $informasiPages = InformasiPage::all();
    //     return view('admin.informasi-page.index', compact('informasiPages'));
    // }

    // public function create()
    // {
    //     return view('admin.informasi-page.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     InformasiPage::create($request->all());

    //     return redirect()->route('admin.informasi-page.index')
    //                      ->with('success', 'Page created successfully.');
    // }

    // public function show($id)
    // {
    //     $informasiPage = InformasiPage::find($id);
    //     return view('admin.informasi-page.show', compact('informasiPage'));
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home'); // or redirect to any other route you want
    }

    // public function edit(InformasiPage $informasiPage)
    // {
    //     return view('admin.informasi-page.edit', compact('informasiPage'));
    // }

    // public function update(Request $request, InformasiPage $informasiPage)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $informasiPage->update($request->all());
    //     return redirect()->route('admin.informasi-page.index')->with('success', 'Page updated successfully.');
    // }

    // public function destroy(InformasiPage $informasiPage)
    // {
    //     $informasiPage->delete();
    //     return redirect()->route('admin.informasi-page.index')->with('success', 'Page deleted successfully.');
    // }
}
