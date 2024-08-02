<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProgramStudyController extends Controller
{
    public function index(Request $request)
    {
        $query = ProgramStudy::query();
        
        // Jika ada filter, tambahkan disini
        if ($request->has('filter_program_studi') && $request->filter_program_studi != '') {
            $query->where('kode_program_studi', $request->filter_program_studi);
        }

        $program_study = $query->get();
        return view('admins.program.index', compact('program_study'));
    }

    public function create()
    {
        return view('admins.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|string|max:10|unique:tb_program_studi,kode_program_studi',
            'nama_program_studi' => 'required|string|max:255',
            'biaya' => 'required|numeric',
            'lama_waktu' => 'required|string',
        ]);

        ProgramStudy::create($request->all());

        return redirect()->route('program_study.index')->with('success', 'Program Studi berhasil ditambahkan');
    }

    public function edit($kode_program_studi)
    {
        $program = ProgramStudy::where('kode_program_studi', $kode_program_studi)->firstOrFail();
        return view('admins.program.edit', compact('program'));
    }

    public function update(Request $request, $kode_program_studi)
    {
        $request->validate([
            'nama_program_studi' => 'required|string|max:255',
            'biaya' => 'required|numeric',
            'lama_waktu' => 'required|string',
        ]);

        $program = ProgramStudy::where('kode_program_studi', $kode_program_studi)->firstOrFail();
        $program->update($request->all());

        return redirect()->route('program_study.index')->with('success', 'Program Studi berhasil diupdate');
    }

    public function destroy($kode_program_studi)
    {
        $program = ProgramStudy::where('kode_program_studi', $kode_program_studi)->firstOrFail();
        $program->delete();

        return redirect()->route('program_study.index')->with('success', 'Program Studi berhasil dihapus');
    }
}
