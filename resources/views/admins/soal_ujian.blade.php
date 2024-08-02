@extends('layouts.app')

@section('title', 'Kelola Soal Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('soal_ujian.create') }}" class="btn btn-success">Tambah Soal Ujian</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('soal_ujian.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="filter_program_studi" class="mr-2">Filter Program Pelatihan:</label>
                        <select name="filter_program_studi" id="filter_program_studi" class="form-control">
                            <option value="">Program Pelatihan</option>
                            @foreach($programStudies as $programStudy)
                                @if($programStudy->nama_program_studi != 'admin')
                                    <option value="{{ $programStudy->kode_program_studi }}" {{ request()->filter_program_studi == $programStudy->kode_program_studi ? 'selected' : '' }}>
                                        {{ $programStudy->nama_program_studi }}
                                    </option>
                                @endif
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group mr-2">
                        <label for="filter_jenis_ujian" class="mr-2">Filter Jenis Ujian:</label>
                        <select name="filter_jenis_ujian" id="filter_jenis_ujian" class="form-control">
                            <option value="">Jenis Ujian</option>
                            @foreach($jenisUjian as $ujian)
                                <option value="{{ $ujian->id_jenis_ujian }}" {{ $filter_jenis_ujian == $ujian->id_jenis_ujian ? 'selected' : '' }}>{{ $ujian->nama_ujian }}</option>
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
                        <h4 class="title">Daftar Soal Ujian</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead class="text">
                                <tr style="font-size: 15px">
                                    <th>No</th>
                                    <th>Pelatihan</th>
                                    <th>Jenis Ujian</th>
                                    <th class="col-md-7">Pertanyaan & Jawaban</th>
                                    <th>Jawaban</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soalUjian as $index => $soal)
                                <tr>
                                    <td>{{ $soalUjian->firstItem() + $index }}</td>
                                    <td>{{ $soal->programStudy->nama_program_studi }}</td>
                                    <td>{{ $soal->jenisUjian->nama_ujian }}</td>
                                    <td style="text-align: left">
                                        <strong>{{ $soal->pertanyaan }}</strong><br>
                                        <span>A. {{ $soal->a }}</span><br>
                                        <span>B. {{ $soal->b }}</span><br>
                                        <span>C. {{ $soal->c }}</span><br>
                                        <span>D. {{ $soal->d }}</span><br>
                                    </td>
                                    <td>{{ $soal->kunci_jawaban }}</td>
                                    <td>
                                        <a href="{{ route('soal_ujian.edit', ['soal_ujian' => $soal->id_soal_ujian]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('soal_ujian.destroy', ['soal_ujian' => $soal->id_soal_ujian]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="filter_program_studi" value="{{ request()->filter_program_studi }}">
                                            <input type="hidden" name="filter_jenis_ujian" value="{{ request()->filter_jenis_ujian }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                        {{ $soalUjian->appends(['filter_program_studi' => request()->filter_program_studi, 'filter_jenis_ujian' => request()->filter_jenis_ujian])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
