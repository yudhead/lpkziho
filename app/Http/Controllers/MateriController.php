<?php

namespace App\Http\Controllers;

use App\Models\ModulMateri;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = ModulMateri::query();

        if ($request->filled('filter_program_studi')) {
            $query->where('kode_program_studi', $request->filter_program_studi);
        }

        $materis = $query->get();
        $programStudis = ProgramStudy::all();

        return view('user.materi.index', compact('materis', 'programStudis'));
    }

    public function show(String $id)
    {
        $materis = ModulMateri::findOrFail($id);
        return view('user.materi.show', compact('materis'));
    }
}

