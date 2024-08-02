@extends('layouts.app')

@section('title', 'Edit Soal Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Edit Soal Ujian</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('soal_ujian.update', $soalUjian->id_soal_ujian) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode_program_studi">Program Studi</label>
                                <select name="kode_program_studi" class="form-control" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach($programStudies as $programStudy)
                                    @if($programStudy->nama_program_studi !='admin')
                                        <option value="{{ $programStudy->kode_program_studi }}" {{ $soalUjian->kode_program_studi == $programStudy->kode_program_studi ? 'selected' : '' }}>{{ $programStudy->nama_program_studi }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jenis_ujian">Jenis Ujian</label>
                                <select name="id_jenis_ujian" class="form-control" required>
                                    <option value="">Pilih Jenis Ujian</option>
                                    @foreach($jenisUjian as $ujian)
                                        <option value="{{ $ujian->id_jenis_ujian }}" {{ $soalUjian->id_jenis_ujian == $ujian->id_jenis_ujian ? 'selected' : '' }}>{{ $ujian->nama_ujian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <textarea name="pertanyaan" class="form-control" required>{{ $soalUjian->pertanyaan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="a">Jawaban A</label>
                                <input type="text" name="a" class="form-control" value="{{ $soalUjian->a }}" required>
                            </div>
                            <div class="form-group">
                                <label for="b">Jawaban B</label>
                                <input type="text" name="b" class="form-control" value="{{ $soalUjian->b }}" required>
                            </div>
                            <div class="form-group">
                                <label for="c">Jawaban C</label>
                                <input type="text" name="c" class="form-control" value="{{ $soalUjian->c }}" required>
                            </div>
                            <div class="form-group">
                                <label for="d">Jawaban D</label>
                                <input type="text" name="d" class="form-control" value="{{ $soalUjian->d }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kunci_jawaban">Kunci Jawaban</label>
                                <input type="text" name="kunci_jawaban" class="form-control" value="{{ $soalUjian->kunci_jawaban }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('soal_ujian.index') }}" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
