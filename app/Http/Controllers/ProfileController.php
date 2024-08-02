<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{

    public function index()
    {
        $profile_pages = Profile::all();
        $data = [
            'title' => 'Daftar Halaman Profle',
            'content' => 'admin.profile-page.index',
            'profile_pages' => $profile_pages,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        return view('admin.profile-page.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $profile_pages = new Profile();
        $profile_pages->title = $validatedData['title'];
        $profile_pages->content = $validatedData['content'];
        $profile_pages->save();

        return redirect()->route('profile-page.index')->with('success', 'Halaman Profile berhasil disimpan.');
    }

    public function show(Profile $profile_pages)
    {
        return view('admin.profile-page.show', compact('profile_pages'));
    }

    public function edit(Profile $profile_pages)
    {
        return view('admin.profile-page.edit', compact('profile_pages'));
    }

    public function update(Request $request, Profile $profile_pages)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $profile_pages->title = $validatedData['title'];
        $profile_pages->content = $validatedData['content'];
        $profile_pages->save();

        return redirect()->route('profile-page.index')->with('success', 'Halaman Profile berhasil diperbarui.');
    }

    public function destroy(Profile $profile_pages)
    {
        $profile_pages->delete();
        return redirect()->route('profile-page.index')->with('success', 'Halaman Profile berhasil dihapus.');
    }

    public function getProfilePages()
    {

        $profile_pages = Profile::ordered()->get();
        return view('profile.index', compact('profile_pages'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Profile::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
