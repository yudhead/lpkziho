@extends('layouts.app_user')

@section('title', 'Ujian')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white d-flex justify-content-between">
                    <span>{{ \Carbon\Carbon::now()->format('d F Y | H:i:s') }}</span>
                    <h4 class="card-title">Daftar Ujian</h4>
                </div>
                <div class="card-body p-0"> 
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelatihan</th>
                                    <th class="d-none d-sm-table-cell">Tanggal</th> 
                                    <th>Durasi</th>
                                    <th>Sesi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->nama_program_studi }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $exam->tanggal_ujian }}</td>
                                    <td>{{ $exam->durasi_ujian }} Menit</td>
                                    <td>{{ $exam->nama_ujian }}</td>
                                    <td>
                                        @if ($exam->status_ujian == 0)
                                            <a href="{{ route('ujian.show', ['kode_program_studi' => $exam->kode_program_studi, 'id_jenis_ujian' => $exam->id_jenis_ujian]) }}" class="btn btn-success btn-ujian">Mulai Ujian</a>
                                        @else
                                            <span class="badge badge-secondary">Ujian Selesai</span>
                                        @endif
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
@endsection
