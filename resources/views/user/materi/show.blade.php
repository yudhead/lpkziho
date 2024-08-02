@extends('layouts.app_user')

@section('title', 'Materi')

@section('content')

<header class="show1">
    <a href="{{ route('materi.index')}}" class="dm no-blue-link"> Daftar Materi >> </a>
    {{$materis->modul_pembelajaran}}
</header>

    <main class="containerxx">
        <div class="box">
            <div class="">
                <h1>{{ $materis->modul_pembelajaran }} >> {{ $materis->programStudi->nama_program_studi }}</h1>
                <p>Judul : {{ $materis->judul_materi }}</p>
                <p>Waktu Unggah : {{ $materis->created_at }}</p>
                <hr class="garis">

                <p class="lead my-3">
                    @if($materis->file_path)
                        <iframe src="{{ asset('storage/modul/' . $materis->file_path) }}#toolbar=0" width="100%"
                            height="800px"></iframe>
                    @else
                        <p>File PDF tidak tersedia</p>
                    @endif
                </p>

                <div class="mt-3">
                    <a href="{{ route('materi.index') }}" class="btn btn-success">
                        <i class=""></i> <strong>Kembali</strong>
                    </a>
                </div>

            </div>
        </div>
    </main>
@endsection
