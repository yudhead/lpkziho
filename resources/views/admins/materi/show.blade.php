@extends('layouts.app')

@section('title', 'Detail Modul Materi')

@section('content')

<body>
    <header class="show1">
        <a href="{{ route('modul_materi.index') }}" class="dm no-blue-link"> Daftar Materi >> </a>
        {{ $materis->modul_pembelajaran }}
    </header>

    <main class="containerxx">
        <div class="box">
            <div class="">
                <h1>{{ $materis->modul_pembelajaran }} >> {{ $materis->programStudi->nama_program_studi }}</h1>
                <h3>{{ $materis->judul_materi }}</h3>
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
                    <a href="{{ route('modul_materi.index') }}" class="btn btn-success">
                        <i class=""></i> <strong>Kembali</strong>
                    </a>
                </div>

            </div>
        </div>
    </main>
    @endsection