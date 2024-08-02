@extends('layouts.app')

@section('title', 'Jenis Ujian')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('jenis_ujian.create') }}" class="btn btn-success">Tambah Jenis Ujian</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="title">Daftar Jenis Ujian</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead class="text">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Ujian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenisUjian as $ujian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ujian->nama_ujian }}</td>
                                    <td>
                                        <a href="{{ route('jenis_ujian.edit', $ujian->id_jenis_ujian) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('jenis_ujian.destroy', ['jenis_ujian' => $ujian->id_jenis_ujian]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $jenisUjian->links() }} <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
