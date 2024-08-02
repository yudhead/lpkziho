<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Tradisional;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TradisionalPageController extends Controller
{
        public function index()
        {
            $tradisional_pages = Tradisional::all();
            $data = [
                'title' => 'Daftar Halaman tradisional',
                'content' => 'admin.tradisional-page.index',
                'tradisional_pages' => $tradisional_pages,
            ];
            return view('admin.layouts.wrapper', $data);
        }

        public function create()
        {
            return view('admin.tradisional-page.create');
        }

        public function store(Request $request)
        {

             $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            ]);


            $tradisional_pages = new Tradisional();
            $tradisional_pages->title = $validatedData['title'];
            $tradisional_pages->content = $validatedData['content'];

            if ($request->hasFile('foto')) {
                $filePath = $request->file('foto')->store('fotopagetradisional', 'public');
                $tradisional_pages->foto = $filePath;
            }


            $tradisional_pages->save();

            return redirect()->route('tradisional-page.index')->with('success', 'Halaman tradisional berhasil disimpan.');
        }


        public function show(Tradisional $tradisional_pages)
        {
            return view('admin.tradisional-page.show', compact('tradisional_pages'));
        }

        public function edit(Tradisional $tradisional_pages)
        {
            return view('admin.tradisional-page.edit', compact('tradisional_pages'));
        }

        public function update(Request $request, Tradisional $tradisional_pages)
        {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',            ]);

            $tradisional_pages->title = $validatedData['title'];
            $tradisional_pages->content = $validatedData['content'];
            if ($request->hasFile('foto')) {
                // Delete the old file
                if ($tradisional_pages->foto) {
                    Storage::delete($tradisional_pages->foto);
                }

                // Upload the new file
                $filePath = $request->file('foto')->store('fotopagetradisional', 'public');
                $tradisional_pages->foto = $filePath;
            }
            $tradisional_pages->save();

            return redirect()->route('tradisional-page.index')->with('success', 'Halaman tradisional berhasil diperbarui.');
        }

        public function destroy(Tradisional $tradisional_pages)
        {
            $tradisional_pages->delete();
            return redirect()->route('tradisional-page.index')->with('success', 'Halaman tradisional berhasil dihapus.');
        }

        public function gettradisionalPages ()
        {

            $tradisional_pages = Tradisional::ordered()->get();
            return view('programstudi.tradisional', compact('tradisional_pages'));
        }

        public function updateOrder(Request $request)
        {
            $order = $request->input('order');
            foreach ($order as $index => $id) {
                Tradisional::where('id', $id)->update(['order' => $index]);
            }

            return response()->json(['success' => true]);
        }

    }

