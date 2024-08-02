@extends('layouts.app')

@section('title', 'Tambah Modul Materi')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">Tambah Modul Materi</div>
                    <div class="card-body">


                        <form action="{{ route('modul_materi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="modul">Modul</label>
                                <input type="text" name="modul" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul Materi</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="kode_program_studi">Program Pelatihan</label>
                                <select name="kode_program_studi" class="form-control" required>
                                    <option value="">Pilih Program Pelatihan</option>
                                    @foreach($programStudis as $programStudi)
                                        <option value="{{ $programStudi->kode_program_studi }}">
                                            {{ $programStudi->nama_program_studi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file_path" class="col-sm-2 col-form-label">Upload PDF</label>
                                <div>
                                    <input type="file" class="form-control" name="file_path" id="file_path" accept="application/pdf" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('modul_materi.index') }}" class="btn btn-primary">Kembali</a>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection