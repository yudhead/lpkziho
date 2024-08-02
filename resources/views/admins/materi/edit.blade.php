@extends('layouts.app')

@section('title', 'Edit Modul Materi')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm rounded-shadow-box">
    <h4 class="fw-bold" style="margin-bottom: 20px">Form Edit Materi</h4>
    <form action="{{ route('modul_materi.update', $materis->id_modul) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="modul" class="col-sm-2 col-form-label">Modul Pembelajaran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='modul' id="modul" value="{{ $materis->modul_pembelajaran }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Materi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' id="judul" value="{{ $materis->judul_materi }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="program" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
                <select class="form-control" name="program" id="program">
                    @foreach($programStudis as $program)
                    <option value="{{ $program->kode_program_studi }}" 
                    {{ $materis->kode_program_studi == $program->kode_program_studi ? 'selected' : '' }}>
                    {{ $program->nama_program_studi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="file_path" class="col-sm-2 col-form-label">File PDF</label>
            <div class="col-sm-10">
                @if($materis->file_path)
                    <p>File PDF Saat Ini: <a href="{{ asset('storage/modul' . $materis->file_path) }}" 
                    target="_blank">{{ basename($materis->file_path) }}</a></p>
                @endif
                <input type="file" class="form-control" name="file_path" id="file_path" accept="application/pdf">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
            </div>
        </div>
        <div class="mb-4 row">
            <div class="col-sm-10 offset-sm-2 button-container">
                <button type="submit" class="btn btn-success" name="submit">UPDATE</button>
                <a href="{{ route('modul_materi.index') }}" class="btn btn-primary">KEMBALI</a>
            </div>
        </div>
    </form>
</div>

@endsection
