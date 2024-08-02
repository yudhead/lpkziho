<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SoalUjian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UjianController extends Controller
{
    public function ujian()
    {
        $siswa = session('siswa');

        if (!$siswa) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $exams = Peserta::where('id_siswa', $siswa->id)
            ->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian', '=', 'tb_jenis_ujian.id_jenis_ujian')
            ->join('tb_program_studi', 'tb_peserta.kode_program_studi', '=', 'tb_program_studi.kode_program_studi')
            ->select('tb_peserta.*', 'tb_program_studi.nama_program_studi', 'tb_jenis_ujian.nama_ujian')
            ->get();

        session(['exams' => $exams]);

        return view('user.ujian', ['exams' => $exams]);
    }

    public function show($kode_program_studi, $id_jenis_ujian)
    {
        $siswa = session('siswa');

        if (!$siswa) {
            return redirect()->route('login')->withErrors('Sesi telah berakhir. Silakan login kembali.');
        }

        $ujian = Peserta::where('kode_program_studi', $kode_program_studi)
            ->where('id_jenis_ujian', $id_jenis_ujian)
            ->where('id_siswa', $siswa->id)
            ->first();

        if (!$ujian) {
            return redirect()->route('ujian')->withErrors('Ujian tidak ditemukan.');
        }

        $soalUjian = SoalUjian::where('kode_program_studi', $kode_program_studi)
            ->where('id_jenis_ujian', $ujian->id_jenis_ujian)
            ->get();

        return view('user.ujian.show', compact('soalUjian', 'ujian'));
    }

    public function submit(Request $request)
    {
        $jawaban = $request->input('jawaban');
        $id_jenis_ujian = $request->input('id_jenis_ujian');
        
        if (!$jawaban) {
            Log::error('Jawaban tidak ditemukan.');
            return redirect()->route('dashboard_user')->withErrors('Jawaban tidak ditemukan.');
        }
        
        Log::info('Jawaban yang diterima: ', ['jawaban' => $jawaban]);
        
        $benar = 0;
        $salah = 0;
        $total_soal = count($jawaban);
        
        foreach ($jawaban as $id_soal_ujian => $jawaban_siswa) {
            $soal = DB::table('tb_soal_ujian')->where('id_soal_ujian', $id_soal_ujian)->first();
            if (!$soal) {
                Log::error('Soal tidak ditemukan untuk ID: ' . $id_soal_ujian);
                continue;
            }
            
            if ($soal->kunci_jawaban == $jawaban_siswa) {
                $benar++;
            } else {
                $salah++;
            }
        }
        
        $siswa = session('siswa');
        if (!$siswa) {
            Log::error('Sesi telah berakhir. Silakan login kembali.');
            return redirect()->route('login')->withErrors('Sesi telah berakhir. Silakan login kembali.');
        }
        
        Log::info('Data siswa: ', (array) $siswa);
        
        $kode_program_studi = $siswa->pelatihan;  // Ambil pelatihan dari session $siswa sebagai kode_program_studi
    
        Log::info('Mencari peserta dengan kondisi:', [
            'id_siswa' => $siswa->id,
            'kode_program_studi' => $kode_program_studi,
            'id_jenis_ujian' => $id_jenis_ujian,
        ]);
    
        $peserta = Peserta::where('id_siswa', $siswa->id)
            ->where('kode_program_studi', $kode_program_studi)
            ->where('id_jenis_ujian', $id_jenis_ujian)
            ->first();
        
        if (!$peserta) {
            Log::error('Peserta tidak ditemukan dengan kondisi yang diberikan.');
            return redirect()->route('ujian')->withErrors('Peserta tidak ditemukan.');
        }
    
        $skor = ($benar / $total_soal) * 100;
    
        Log::info('Skor ujian: ', ['benar' => $benar, 'salah' => $salah, 'skor' => $skor]);
    
        try {
            $updated = DB::table('tb_peserta')
                ->where('kode_program_studi', $kode_program_studi)
                ->where('id_siswa', $siswa->id)
                ->where('id_jenis_ujian', $id_jenis_ujian)
                ->update([
                    'benar' => $benar,
                    'salah' => $salah,
                    'nilai' => $skor,
                    'status_ujian' => 1,
                    'updated_at' => now()
                ]);
        
            Log::info('Hasil update: ', ['updated' => $updated]);
        
            if ($updated) {
                Log::info('Data peserta berhasil diperbarui.', ['benar' => $benar, 'salah' => $salah, 'nilai' => $skor]);
                return redirect()->route('ujian')->with('success', 'Data peserta berhasil diperbarui.');
            } else {
                Log::warning('Tidak ada data yang diperbarui.');
                return redirect()->route('dashboard_user')->with('warning', 'Tidak ada data yang diperbarui.');
            }
        } catch (\Exception $e) {
            Log::error('Error memperbarui data: ' . $e->getMessage());
            return redirect()->route('ujian')->withErrors('Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }
            }    