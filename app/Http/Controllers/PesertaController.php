<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\JenisUjian;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $default_program_studi = 'T1';
        $filter_program_studi = $request->input('filter_program_studi', $default_program_studi);
        $filter_tanggal = $request->input('filter_tanggal', '');
        $filter_bulan = $request->input('filter_bulan', '');
        $filter_jenis_ujian = $request->input('filter_jenis_ujian', '');

        $query = Peserta::query();

        if ($filter_program_studi) {
            $query->where('kode_program_studi', $filter_program_studi);
        }

        if ($filter_tanggal) {
            $query->whereDate('created_at', $filter_tanggal);
        }

        if ($filter_bulan) {
            $query->whereMonth('created_at', date('m', strtotime($filter_bulan)))
                  ->whereYear('created_at', date('Y', strtotime($filter_bulan)));
        }

        if ($filter_jenis_ujian) {
            $query->where('id_jenis_ujian', $filter_jenis_ujian);
        }

        $pesertas = $query->with('siswa', 'jenisUjian', 'programStudi')
                          ->orderBy('created_at', 'desc')
                          ->paginate(100);

        $programStudies = ProgramStudy::all();
        $jenisUjians = JenisUjian::all();

        return view('admins.peserta', compact('pesertas', 'programStudies', 'jenisUjians', 'filter_program_studi', 'filter_tanggal', 'filter_bulan', 'filter_jenis_ujian'));
    }

    public function create()
    {
        $program_studies = ProgramStudy::all();
        $siswas = Pendaftaran::all();
        $jenisUjians = JenisUjian::all();
        return view('admins.create-peserta', compact('siswas', 'jenisUjians', 'program_studies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|exists:tb_program_studi,kode_program_studi',
            'id_siswa' => 'required|exists:pendaftaran,id',
            'id_jenis_ujian' => 'required|exists:tb_jenis_ujian,id_jenis_ujian',
            'tanggal_ujian' => 'required|date',
            'durasi_ujian' => 'required|integer',
            'status_ujian' => 'required|boolean',
        ]);

        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Peserta ujian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $program_studies = ProgramStudy::all();
        $siswas = Pendaftaran::all();
        $jenisUjians = JenisUjian::all();
        return view('admins.create-peserta', compact('peserta', 'siswas', 'jenisUjians', 'program_studies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_program_studi' => 'required|exists:tb_program_studi,kode_program_studi',
            'id_siswa' => 'required|exists:pendaftaran,id',
            'id_jenis_ujian' => 'required|exists:tb_jenis_ujian,id_jenis_ujian',
            'tanggal_ujian' => 'required|date',
            'durasi_ujian' => 'required|integer',
            'status_ujian' => 'required|boolean',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Peserta ujian berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index', [
            'filter_program_studi' => $request->input('filter_program_studi'),
            'filter_tanggal' => $request->input('filter_tanggal'),
            'filter_bulan' => $request->input('filter_bulan'),
            'filter_jenis_ujian' => $request->input('filter_jenis_ujian')
        ])->with('success', 'Peserta ujian berhasil dihapus');
    }
}
