@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <form action="{{ route('siswa.index') }}" method="GET" class="form-inline">
                <div class="form-group">
                    <label for="filter_pelatihan" class="mr-2">Filter Pelatihan:</label>
                    <select name="filter_pelatihan" id="filter_pelatihan" class="form-control mr-2">
                        <option value="">Pilih Pelatihan</option>
                        @foreach($programStudis as $programStudi)
                        <option value="{{ $programStudi->kode_program_studi }}" {{ $filter_pelatihan == $programStudi->kode_program_studi ? 'selected' : '' }}>
                            {{ $programStudi->nama_program_studi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter_tanggal" class="mr-2">Tanggal:</label>
                    <input type="date" name="filter_tanggal" id="filter_tanggal" class="form-control mr-2" value="{{ $filter_tanggal }}">
                </div>
                <div class="form-group">
                    <label for="filter_bulan" class="mr-2">Bulan:</label>
                    <input type="month" name="filter_bulan" id="filter_bulan" class="form-control mr-2" value="{{ $filter_bulan }}">
                </div>
                <div class="form-group">
                    <label for="filter_hari" class="mr-2">Hari:</label>
                    <select name="filter_hari" id="filter_hari" class="form-control mr-2">
                        <option value="">Pilih Hari</option>
                        <option value="6 hari" {{ $filter_hari == '6 hari' ? 'selected' : '' }}>6 Hari</option>
                        <option value="10 hari" {{ $filter_hari == '10 hari' ? 'selected' : '' }}>10 Hari</option>
                        <option value="15 hari" {{ $filter_hari == '15 hari' ? 'selected' : '' }}>15 Hari</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <div class="row mb-3">
            <a href="{{ route('siswa.export', [
                    'filter_pelatihan' => request()->filter_pelatihan, 
                    'filter_tanggal' => request()->filter_tanggal, 
                    'filter_bulan' => request()->filter_bulan, 
                    'filter_hari' => request()->filter_hari]) }}" 
                class="btn btn-success">Export to Excel</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Data Siswa</h4>
                    </div>
                    <div class="col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-content table-responsive">
                        <table id="example" class="table table-bordered table-hover w-100">
                            <thead class="text">
                                <tr style="font-size:15px;">
                                    <th>No</th>
                                    <th>Program Pelatihan</th>
                                    <th>Nama</th>
                                    <th>Hari</th>
                                    <th>Alamat</th>
                                    <th>No. HP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Kota Kelahiran</th>
                                    <th>Tanggal Lahir</th>
                                    <th>NIK</th>
                                    <th>Tanggal Terbit Identitas</th>
                                    <th>Tanggal Berakhir Identitas</th>
                                    <th>Nama Ibu</th>
                                    <th>Pekerjaan</th>
                                    <th>Bekerja Detail</th>
                                    <th>Freelance Detail</th>
                                    <th>KTP</th>
                                    <th>Pas Foto</th>
                                    <th>Ijazah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->programStudy->nama_program_studi }}</td>
                                        <td>{{ $siswa->name }}</td>
                                        <td>{{ $siswa->harie }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>{{ $siswa->nohp }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->kota_lahir }}</td>
                                        <td>{{ $siswa->tgl_lahir }}</td>
                                        <td>{{ $siswa->nik }}</td>
                                        <td>{{ $siswa->tanggal_terbit }}</td>
                                        <td>{{ $siswa->tanggal_berakhir }}</td>
                                        <td>{{ $siswa->nama_ibu }}</td>
                                        <td>{{ $siswa->pekerjaan }}</td>
                                        <td>{{ $siswa->bekerja_detail }}</td>
                                        <td>{{ $siswa->freelance_detail }}</td>
                                        <td>
                                            @if ($siswa->foto_ktp)
                                                <img src="{{ asset('storage/' . $siswa->foto_ktp) }}" alt="Foto KTP" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($siswa->pas_foto)
                                                <img src="{{ asset('storage/' . $siswa->pas_foto) }}" alt="Pas Foto" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($siswa->foto_ijazah)
                                                <img src="{{ asset('storage/' . $siswa->foto_ijazah) }}" alt="Foto Ijazah" width="50">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $siswas->appends(['filter_pelatihan' => request()->filter_pelatihan, 'filter_tanggal' => request()->filter_tanggal, 'filter_bulan' => request()->filter_bulan, 'filter_hari' => request()->filter_hari])->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
