@extends('layouts.app')

@section('title', 'Hasil Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('hasil_ujian.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="filter_program_studi" class="mr-2">Pilih Program :</label>
                        <select name="filter_program_studi" id="filter_program_studi" class="form-control mr-2">
                            <option value="">Program</option>
                            @foreach($programStudis as $programStudi)
                                @if($programStudi->nama_program_studi != 'admin')
                                    <option value="{{ $programStudi->kode_program_studi }}" {{ $filter_program_studi == $programStudi->kode_program_studi ? 'selected' : '' }}>
                                        {{ $programStudi->nama_program_studi }}
                                    </option>
                                @endif
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
                        <h4 class="title" style="font-size: 20px">Hasil Ujian</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="example" class="table table-bordered table-hover w-100">
                            <thead class="text" style="font-size: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIK</th>
                                    <th>Program Pelatihan</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Jenis Ujian</th>
                                    <th>Benar</th>
                                    <th>Salah</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasilUjian as $hasil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($hasil->siswa)->name }}</td>
                                    <td>{{ optional($hasil->siswa)->nik }}</td>
                                    <td>{{ optional($hasil->programStudi)->nama_program_studi }}</td>
                                    <td>{{ $hasil->tanggal_ujian }}</td>
                                    <td>{{ optional($hasil->jenisUjian)->nama_ujian }}</td>
                                    <td>{{ $hasil->benar }}</td>
                                    <td>{{ $hasil->salah }}</td>
                                    <td>{{ $hasil->nilai }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $hasilUjian->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
