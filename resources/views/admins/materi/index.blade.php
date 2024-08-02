@extends('layouts.app')

@section('title', 'Daftar Modul Materi')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('modul_materi.create') }}" class="btn btn-success">Tambah Modul Materi</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('modul_materi.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter_program_studi" class="form-control">
                            <option value="">Pilih Program Pelatihan</option>
                            @foreach($programStudis as $programStudi)
                                <option value="{{ $programStudi->kode_program_studi }}" {{ request('filter_program_studi') == $programStudi->kode_program_studi ? 'selected' : '' }}>
                                    {{ $programStudi->nama_program_studi }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-primary text-white" style="font-size: 20px">Daftar Modul Materi</div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Modul</th>
                                    <th>Judul Materi</th>
                                    <th>Program Pelatihan</th>
                                    <th>File Modul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($modulMateris as $modul)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $modul->modul_pembelajaran }}</td>
                                        <td>{{ $modul->judul_materi }}</td>
                                        <td>{{ $modul->programStudi->nama_program_studi }}</td>
                                        <td>{{ $modul->file_path }}</td>
                                        <td>
                                            <a href="{{ route('modul_materi.edit', $modul->id_modul) }}"
                                                class="btn btn-warning btn-sm">Ubah</a>
                                            <form action="{{ route('modul_materi.destroy', $modul->id_modul) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                            <a href="{{ route('modul_materi.show', $modul->id_modul) }}"
                                                class="btn btn-primary btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $modulMateris->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection