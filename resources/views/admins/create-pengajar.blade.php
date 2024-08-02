@extends('layouts.app')

@section('title', isset($pengajar) ? 'Edit Pengajar' : 'Tambah Pengajar')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">{{ isset($pengajar) ? 'Edit Pengajar' : 'Tambah Pengajar' }}</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ isset($pengajar) ? route('pengajar.update', $pengajar->NIK) : route('pengajar.store') }}" method="POST">
                            @csrf
                            @if(isset($pengajar))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input type="text" name="NIK" class="form-control" value="{{ isset($pengajar) ? $pengajar->NIK : old('NIK') }}" {{ isset($pengajar) ? 'readonly' : 'required' }}>
                            </div>
                            <div class="form-group">
                                <label for="nama_pengajar">Nama Pengajar</label>
                                <input type="text" name="nama_pengajar" class="form-control" value="{{ isset($pengajar) ? $pengajar->nama_pengajar : old('nama_pengajar') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_program_studi">Program Kerja

                                </label>
                                <select name="nama_program_studi" id="nama_program_studi" class="form-control" required>
                                    @foreach($program_studies as $program_studi)
                                        <option value="{{ $program_studi->nama_program_studi }}" {{ isset($pengajar) && $pengajar->nama_program_studi == $program_studi->nama_program_studi ? 'selected' : '' }}>{{ $program_studi->nama_program_studi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($pengajar) ? 'Update' : 'Tambah' }}</button>
                            <a href="{{ route('pengajar.index') }}" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
