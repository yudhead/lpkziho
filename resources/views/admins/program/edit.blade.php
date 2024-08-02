@extends('layouts.app')

@section('title', 'Edit Program Study')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Edit Program Kerja</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('program_study.update', $program->kode_program_studi) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode_program_studi">Kode Program Kerja</label>
                                <input type="text" name="kode_program_studi" class="form-control" value="{{ $program->kode_program_studi }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_program_studi">Nama Program Kerja</label>
                                <input type="text" name="nama_program_studi" class="form-control" value="{{ $program->nama_program_studi }}" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input type="number" name="biaya" class="form-control" value="{{ $program->biaya }}" required>
                            </div>
                            <div class="form-group">
                                <label for="lama_waktu">Lama Waktu</label>
                                <input type="text" name="lama_waktu" class="form-control" value="{{ $program->lama_waktu }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('program_study.index') }}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
