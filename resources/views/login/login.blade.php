@extends('login.layout')

@section('content')

<div class="card" style="background-color: #007BFF;">
    <div class="card-header text-sm" style="color: white; text-align: center;">
        <h3>LOGIN</h3>
    </div>
    <div class="card-body" style="background-color: #ECEEF1;">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" style="color: #131313;">Email:</label>
                <input type="text" class="form-control" style="background-color: #DDE3EC; border: none;" value="{{ old('email') }}" name="email" id="email" placeholder="Masukkan EMAIL">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" style="color: #131313;">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" style="background-color: #DDE3EC; border: none;" name="password" placeholder="Masukkan Password" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="far fa-eye" id="togglePassword"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #45B6AF;">
                        LOGIN
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <a href="{{ url('pendaftaran') }}" class="btn btn-primary btn-block" style="background-color: #b64545;">
                        KEMBALI
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <p class="text-center" style="color: #131111;">Tidak memiliki akun? <a href="{{ url('pendaftaran') }}" style="color: #45B6AF;">Daftar</a></p>
                </div>
            </div>
        </form>

    </div>
    <div class="card-footer text-muted text-center" style="color: white;">
        <p style="color: white">Copyright© zihokaryajayati</p>
    </div>
</div>

<style>
    .card {
        width: 400px;
        margin: auto;
        margin-top: 50px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        color: white;
    }

    .card-header h3 {
        margin-bottom: 0;
    }
</style>

@endsection
