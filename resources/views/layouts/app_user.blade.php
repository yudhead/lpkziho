<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @media (max-width: 767px) {
            .navbar-nav {
                display: flex;
                flex-direction: row;
                justify-content: start;
            }
            .navbar-nav .nav-item {
                margin-right: 10px;
            }
            .navbar-nav .nav-item .nav-link {
                display: flex;
                align-items: center;
            }

            .wrapper .sidebar h3 {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar bg-dark" id="sidebar">
            <div class="sidebar-header">
                <h3>
                    @if(session('pendaftaran_user'))
                        {{ session('pendaftaran_user')->name }}
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </h3>
                <div class="profile">
                    <span class="status online text-success">Online</span>
                </div>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('dashboard_user') }}">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('materi.index') }}">
                        <span class="icon">
                            <i class="fas fa-book"></i>
                        </span>
                        <span>Modul Materi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ujian') }}">
                        <span class="icon">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        <span>Ujian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>Keluar Akun</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleSidebar()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand d-none d-lg-block" href="{{ route('dashboard_user') }}">Dashboard</a>
                    <div id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="material-icons">person</i>
                                    <span class="d-lg-none d-md-block"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="material-icons">exit_to_app</i>
                                    <span class="d-lg-none d-md-block"></span>
                                </a>
                                <form id="logout-form" action="{{ route('login') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
    @yield('scripts')
</body>
</html>
