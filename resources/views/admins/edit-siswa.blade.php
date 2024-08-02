@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Edit Siswa</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('siswa.update', ['siswa' => $siswa->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode_program_studi">Kode Program Kerja</label>
                                <input type="text" name="kode_program_studi" class="form-control" value="{{ $siswa->kode_program_studi }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nis">NIK</label>
                                <input type="number" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $siswa->username }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ $siswa->password }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
