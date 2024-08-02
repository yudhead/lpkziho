@extends('layouts.app_user')

@section('title', 'Materi')

@section('content')
<header>
    <div class="header">
        <h1>Materi List</h1>
    </div>
</header>

<div class="containerxx">
    <div class="row mb-3">
        <div class="col-md-12">
            <form action="{{ route('materi.index') }}" method="GET">
            <div class="cxcx">
                <div class="input-group">
                    <select name="filter_program_studi" class="form-control">
                        <option value="">Pilih Program Pelatihan</option>
                        @foreach($programStudis as $programStudi)
                            <option value="{{ $programStudi->kode_program_studi }}" 
                            {{ request('filter_program_studi') == $programStudi->kode_program_studi ? 'selected' : '' }}>
                                {{ $programStudi->nama_program_studi }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-listxx">
        @foreach($materis as $item)
            <div class="cardxx">
                <div class="card-headerxx">
                    <span class="tag">{{ $item->modul_pembelajaran }} →
                        {{ $item->programStudi->nama_program_studi }}</span>
                </div>
                <div class="card-bodyxx">
                    <h2>{{ $item->judul_materi }}</h2>
                    <p></p>
                </div>
                <hr class="garis">
                <div class="card-footerxx">
                    <span class="date">{{ $item->created_at->format('d M Y') }}</span>
                    <a href="{{ route('materi.show', $item->id_modul) }}" class="read-more">Lihat Modul →</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection