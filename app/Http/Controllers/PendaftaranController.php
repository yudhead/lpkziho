<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\JenisUjian;
use App\Models\pendaftaran;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class PendaftaranController extends Controller
{

    public function index(Request $request)
    {
        $pendaftarans = Pendaftaran::all();
        $filter_program_studi = $request->input('filter_program_studi', 'In1');
        $filter_bulan = $request->input('filter_bulan', null);
        $query = Pendaftaran::with('programStudy');
        $programStudis = ProgramStudy::all();
        $pendaftaranss = $query->paginate(10);

        if ($filter_program_studi) {
            $query->where('kode_program_studi', $filter_program_studi);
        }

        if ($filter_bulan) {
            $query->whereMonth('created_at', $filter_bulan);
        }

        $query = $request->input('query');
        $ProgramStudy = ProgramStudy::all();
        if ($query) {
            $pendaftarans = Pendaftaran::where('name', 'LIKE', "%{$query}%")
                ->orWhere('nohp', 'LIKE', "%{$query}%")
                ->orWhere('nik', 'LIKE', "%{$query}%")
                ->orWhere('alamat', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $pendaftarans = Pendaftaran::all();
        }

        $data = [
            'title' => 'Data Siswa',
            'content' => 'admin.pendaftaran.index',
            'programStudis' => $programStudis,
            'filter_program_studi' => $filter_program_studi,
            'filter_bulan' => $filter_bulan,
            'pendaftarans' => $pendaftarans,

        ];
        return view('admin.layouts.wrapper', $data, compact('pendaftarans','query','ProgramStudy','filter_bulan','filter_program_studi','pendaftaranss'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'harie' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pelatihan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'sekolah' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'kota_lahir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tanggal_terbit' => 'required|date',
            'tanggal_berakhir' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pendaftaran',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'pas_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto_ijazah' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $data = [
            'harie' => $request->harie,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'pelatihan' => $request->pelatihan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'sekolah' => $request->sekolah,
            'agama' => $request->agama,
            'kota_lahir' => $request->kota_lahir,
            'pekerjaan' => $request->pekerjaan,
            'bekerja_detail' => $request->bekerja_detail,
            'freelance_detail' => $request->freelance_detail,
            'tgl_lahir' => $request->tgl_lahir,
            'tanggal_terbit' => $request->tanggal_terbit,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'nama_ibu' => $request->nama_ibu, // Simpan nama_ibu dalam bentuk teks biasa
            'password' => Hash::make($request->nama_ibu), // Hash nama_ibu dan simpan ke kolom password
            'email' => $request->email,
        ];
    
        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('upload-gambar', 'public');
        }
        if ($request->hasFile('pas_foto')) {
            $data['pas_foto'] = $request->file('pas_foto')->store('passfoto', 'public');
        }
        if ($request->hasFile('foto_ijazah')) {
            $data['foto_ijazah'] = $request->file('foto_ijazah')->store('ijazah', 'public');
        }
    
        $pendaftaran = Pendaftaran::create($data);
        $jenisUjians = JenisUjian::all();
        foreach ($jenisUjians as $jenisUjian) {
            Peserta::create([
                'kode_program_studi' => $request->pelatihan,
                'id_siswa' => $pendaftaran->id,
                'id_jenis_ujian' => $jenisUjian->id_jenis_ujian,
                'tanggal_ujian' => now(),
                'durasi_ujian' => 30,
                'status_ujian' => false,
            ]);
        }
    
        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan.');
    }
    

    public function create()
    {
        $programStudies = ProgramStudy::all();
        return view('pendaftaran.pendaftaran', compact('programStudies'));
    }
}
