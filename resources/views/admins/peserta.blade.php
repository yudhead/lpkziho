@extends('layouts.app')

@section('title', 'Data Peserta Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-2">
                <a href="{{ route('peserta.create') }}" class="btn btn-success btn-block">Tambah Peserta</a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('jenis_ujian.index') }}" class="btn btn-info btn-block">Data Jenis Ujian</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('peserta.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="filter_program_studi" class="mr-2">Pilih Program:</label>
                        <select name="filter_program_studi" id="filter_program_studi" class="form-control mr-2">
                            <option value="">Pilih Program</option>
                            @foreach($programStudies as $programStudi)
                                <option value="{{ $programStudi->kode_program_studi }}" {{ $filter_program_studi == $programStudi->kode_program_studi ? 'selected' : '' }}>
                                    {{ $programStudi->nama_program_studi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        <label for="filter_tanggal" class="mr-2">Tanggal:</label>
                        <input type="date" name="filter_tanggal" id="filter_tanggal" class="form-control mr-2" value="{{ $filter_tanggal }}">
                    </div>
                    <div class="form-group mr-2">
                        <label for="filter_bulan" class="mr-2">Bulan:</label>
                        <input type="month" name="filter_bulan" id="filter_bulan" class="form-control mr-2" value="{{ $filter_bulan }}">
                    </div>
                    <div class="form-group mr-2">
                        <label for="filter_jenis_ujian" class="mr-2">Ujian:</label>
                        <select name="filter_jenis_ujian" id="filter_jenis_ujian" class="form-control mr-2">
                            <option value="">Semua</option>
                            @foreach($jenisUjians as $jenisUjian)
                                <option value="{{ $jenisUjian->id_jenis_ujian }}" {{ $filter_jenis_ujian == $jenisUjian->id_jenis_ujian ? 'selected' : '' }}>
                                    {{ $jenisUjian->nama_ujian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Data Peserta Ujian</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="example" class="table table-bordered table-hover w-100">
                            <thead class="text">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Program Kerja</th>
                                    <th>Jenis Ujian</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($peserta->siswa)->name }}</td>
                                    <td>{{ optional($peserta->programStudi)->nama_program_studi }}</td>
                                    <td>{{ optional($peserta->jenisUjian)->nama_ujian }}</td>
                                    <td>{{ $peserta->tanggal_ujian }}</td>
                                    <td>{{ $peserta->durasi_ujian }} menit</td>
                                    <td>
                                        @if($peserta->status_ujian)
                                            <span class="badge badge-success">Selesai Ujian</span>
                                        @else
                                            <span class="badge badge-danger">Belum Ujian</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('peserta.edit', $peserta->id_peserta) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('peserta.destroy', $peserta->id_peserta) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $pesertas->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
