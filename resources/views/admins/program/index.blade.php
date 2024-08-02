@extends('layouts.app')

@section('title', 'Daftar Program Pelatihan')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('program_study.create') }}" class="btn btn-success">Tambah Program Studi</a>
            </div>
        </div>
        <!-- Optional: Filter for Program Studi -->
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('program_study.index') }}" method="GET">
                    <div class="input-group">
                        <select name="filter_program_studi" class="form-control">
                            <option value="">Pilih Program Studi</option>
                            @foreach($program_study as $programStudi)
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
                        <div class="card-header bg-primary text-white" style="font-size: 20px">Daftar Program Studi</div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Kode Program Kerja</th>
                                    <th>Nama Program Kerja</th>
                                    <th>Biaya</th>
                                    <th>Lama Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($program_study as $program)
                                    <tr>
                                        <td>{{ $program->kode_program_studi }}</td>
                                        <td>{{ $program->nama_program_studi }}</td>
                                        <td>{{ $program->biaya }}</td>
                                        <td>{{ $program->lama_waktu }}</td>
                                        <td>
                                            <a href="{{ route('program_study.edit', $program->kode_program_studi) }}"
                                                class="btn btn-warning btn-sm">Ubah</a>
                                            <form action="{{ route('program_study.destroy', $program->kode_program_studi) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus program studi ini?');">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
