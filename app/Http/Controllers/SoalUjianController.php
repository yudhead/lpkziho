<?php

namespace App\Http\Controllers;

use App\Models\SoalUjian;
use App\Models\JenisUjian;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SoalUjianController extends Controller
{
    public function index(Request $request)
    {
        $filter_program_studi = $request->input('filter_program_studi', 'T1'); // Default program studi T1
        $filter_jenis_ujian = $request->input('filter_jenis_ujian', '2'); // Default jenis ujian 1
    
        $query = SoalUjian::query();
    
        if ($filter_program_studi) {
            $query->where('kode_program_studi', $filter_program_studi);
        }
    
        if ($filter_jenis_ujian) {
            $query->where('id_jenis_ujian', $filter_jenis_ujian);
        }
    
        $soalUjian = $query->paginate(20);
        $programStudies = ProgramStudy::all();
        $jenisUjian = JenisUjian::all();
    
        return view('admins.soal_ujian', compact('soalUjian', 'programStudies', 'jenisUjian', 'filter_program_studi', 'filter_jenis_ujian'));
    }
    

    public function create()
    {
        $programStudies = ProgramStudy::all();
        $jenisUjian = JenisUjian::all();
        return view('admins.create-soal_ujian', compact('programStudies', 'jenisUjian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|exists:tb_program_studi,kode_program_studi',
            'pertanyaan' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'kunci_jawaban' => 'required|string|max:1',
        ]);

        $jenisUjianList = JenisUjian::all();

        foreach ($jenisUjianList as $jenisUjian) {
            SoalUjian::create([
                'kode_program_studi' => $request->kode_program_studi,
                'id_jenis_ujian' => $jenisUjian->id_jenis_ujian,
                'pertanyaan' => $request->pertanyaan,
                'a' => $request->a,
                'b' => $request->b,
                'c' => $request->c,
                'd' => $request->d,
                'kunci_jawaban' => $request->kunci_jawaban,
            ]);
        }

        return redirect()->route('soal_ujian.index', [
            'filter_program_studi' => $request->kode_program_studi
        ])->with('success', 'Soal ujian berhasil ditambahkan untuk semua jenis ujian');
    }

    public function edit($id)
    {
        $soalUjian = SoalUjian::findOrFail($id);
        $programStudies = ProgramStudy::all();
        $jenisUjian = JenisUjian::all();
        return view('admins.edit-soal_ujian', compact('soalUjian', 'programStudies', 'jenisUjian'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_program_studi' => 'required|exists:tb_program_studi,kode_program_studi',
            'id_jenis_ujian' => 'required|exists:tb_jenis_ujian,id_jenis_ujian',
            'pertanyaan' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'kunci_jawaban' => 'required|string|max:1',
        ]);

        $soalUjian = SoalUjian::findOrFail($id);
        $soalUjian->update($request->all());

        return redirect()->route('soal_ujian.index', [
            'filter_program_studi' => $request->kode_program_studi,
            'filter_jenis_ujian' => $request->id_jenis_ujian
        ])->with('success', 'Soal ujian berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $soalUjian = SoalUjian::findOrFail($id);
        $soalUjian->delete();
    
        return redirect()->route('soal_ujian.index', [
            'filter_program_studi' => $request->input('filter_program_studi'),
            'filter_jenis_ujian' => $request->input('filter_jenis_ujian')
        ])->with('success', 'Soal ujian berhasil dihapus');
    }
}
