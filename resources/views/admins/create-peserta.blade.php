@extends('layouts.app')

@section('title', isset($peserta) ? 'Edit Peserta Ujian' : 'Tambah Peserta Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">{{ isset($peserta) ? 'Edit' : 'Tambah' }} Peserta Ujian</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ isset($peserta) ? route('peserta.update', $peserta->id_peserta) : route('peserta.store') }}" method="POST">
                            @csrf
                            @if(isset($peserta))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="nama_program_studi">Program Kerja</label>
                                <select name="kode_program_studi" id="nama_program_studi" class="form-control" required>
                                    <option value="">Pilih Program Kerja</option>
                                    @foreach($program_studies as $program_studi)
                                        <option value="{{ $program_studi->kode_program_studi }}" {{ isset($peserta) && $peserta->kode_program_studi == $program_studi->kode_program_studi ? 'selected' : '' }}>{{ $program_studi->nama_program_studi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" id="search_siswa" class="form-control" placeholder="Ketik nama siswa...">
                                <select name="id_siswa" id="nama_siswa" class="form-control mt-2" required>
                                    <option value="">Pilih Siswa</option>
                                    @foreach($siswas as $siswa)
                                        <option value="{{ $siswa->id }}" data-program="{{ $siswa->pelatihan }}" {{ isset($peserta) && $peserta->id_siswa == $siswa->id ? 'selected' : '' }}>{{ $siswa->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id_jenis_ujian">Jenis Ujian</label>
                                        <select name="id_jenis_ujian" class="form-control" required>
                                            @foreach($jenisUjians as $jenisUjian)
                                                <option value="{{ $jenisUjian->id_jenis_ujian }}" {{ isset($peserta) && $peserta->id_jenis_ujian == $jenisUjian->id_jenis_ujian ? 'selected' : '' }}>{{ $jenisUjian->nama_ujian }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggal_ujian">Tanggal Ujian</label>
                                        <input type="date" name="tanggal_ujian" class="form-control" value="{{ isset($peserta) ? $peserta->tanggal_ujian : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="durasi_ujian">Durasi Ujian</label>
                                        <input type="number" name="durasi_ujian" class="form-control" value="{{ isset($peserta) ? $peserta->durasi_ujian : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status_ujian">Status Ujian</label>
                                        <select name="status_ujian" class="form-control" required>
                                            <option value="0" {{ isset($peserta) && $peserta->status_ujian == 0 ? 'selected' : '' }}>Belum Ujian</option>
                                            <option value="1" {{ isset($peserta) && $peserta->status_ujian == 1 ? 'selected' : '' }}>Selesai Ujian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('peserta.index') }}" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const programSelect = document.getElementById('nama_program_studi');
        const siswaSelect = document.getElementById('nama_siswa');
        const searchSiswaInput = document.getElementById('search_siswa');
        const siswaOptions = Array.from(siswaSelect.options);

        function filterSiswaOptions() {
            const searchValue = searchSiswaInput.value.toLowerCase();
            const selectedProgram = programSelect.value;

            while (siswaSelect.options.length > 1) {
                siswaSelect.remove(1);
            }

            siswaOptions.forEach(option => {
                const isNameMatch = option.text.toLowerCase().includes(searchValue);
                const isProgramMatch = selectedProgram ? option.dataset.program === selectedProgram : true;

                if (isNameMatch && isProgramMatch) {
                    siswaSelect.add(option.cloneNode(true));
                }
            });
        }

        programSelect.addEventListener('change', filterSiswaOptions);
        searchSiswaInput.addEventListener('input', filterSiswaOptions);

        @if(isset($peserta))
            // Trigger change event on load to filter siswa options based on the selected program
            programSelect.dispatchEvent(new Event('change'));
        @endif
    });
</script>
@endsection
