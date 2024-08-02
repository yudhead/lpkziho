@extends('layouts.app')

@section('title', isset($jenisUjian) ? 'Edit Jenis Ujian' : 'Tambah Jenis Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">{{ isset($jenisUjian) ? 'Edit Jenis Ujian' : 'Tambah Jenis Ujian' }}</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ isset($jenisUjian) ? route('jenis_ujian.update', $jenisUjian->id_jenis_ujian) : route('jenis_ujian.store') }}" method="POST">
                            @csrf
                            @if(isset($jenisUjian))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="nama_ujian">Nama Ujian</label>
                                <input type="text" name="nama_ujian" class="form-control" value="{{ isset($jenisUjian) ? $jenisUjian->nama_ujian : '' }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($jenisUjian) ? 'Update' : 'Simpan' }}</button>
                            <a href="{{ route('jenis_ujian.index') }}" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
