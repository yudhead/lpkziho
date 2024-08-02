@extends('layouts.app')

@section('title', 'Daftar Pengajar')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('pengajar.create') }}" class="btn btn-success">Tambah Pengajar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Daftar Pengajar</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead class="text" style="font-size: 13px">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Pengajar</th>
                                    <th>Program Pelatihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajar as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->NIK }}</td>
                                    <td>{{ $p->nama_pengajar }}</td>
                                    <td>{{ $p->nama_program_studi }}</td>
                                    <td>
                                        <a href="{{ route('pengajar.edit', ['pengajar' => $p->NIK]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pengajar.destroy', ['pengajar' => $p->NIK]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
