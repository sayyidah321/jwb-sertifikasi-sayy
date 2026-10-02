<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi Sayyidah - Junior Web Developer</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f3cbee;
        color: #1e293b;
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .navbar-custom {
        background-color: #67c2ec !important;
        border-bottom: 1px solid #fafafa;
    }

    .navbar-custom .navbar-brand {
        color: #0f172a !important;
        font-weight: 700;
    }

    .navbar-custom .nav-link {
        color: #e7ecec !important;
        font-weight: 500;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
        color: #2563eb !important;
    }

    .btn-outline-custom {
        border: none !important;
        background-color: #dc2626 !important;
        color: #ffffff !important;
        font-weight: 600;
    }

    .btn-outline-custom:hover {
        background-color: #b91c1c !important;
    }

    .btn-primary,
    .btn-pink,
    .btn-primary-custom,
    button[type="submit"]:not(.btn-outline-custom):not(.btn-danger) {
        background-color: #2563eb !important;
        border-color: #2563eb !important;
        color: #ffffff !important;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .btn-primary:hover,
    .btn-pink:hover,
    .btn-primary-custom:hover,
    button[type="submit"]:not(.btn-outline-custom):not(.btn-danger):hover {
        background-color: #1d4ed8 !important;
        border-color: #1d4ed8 !important;
    }

    .btn-secondary,
    a.btn-secondary {
        background-color: #64748b !important;
        color: #ffffff !important;
        border: none;
        padding: 8px 18px;
        border-radius: 6px;
    }

    .btn-danger {
        background-color: #dc2626 !important;
        border-color: #dc2626 !important;
        color: #ffffff !important;
    }

    .btn-danger:hover {
        background-color: #b91c1c !important;
        border-color: #b91c1c !important;
    }

    .badge,
    td span {
        background-color: #8cb7f0 !important;
        color: #0f172a !important;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .card {
        border: 1px solid #fffdff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    footer {
        display: none !important;
    }
    </style>
</head>
<body>
    @if(!request()->routeIs('login'))
        @auth
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    Aplikasi Sertifikasi JWD Sayyidah
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link px-3" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="{{ route('skema.index') }}">Data Skema</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="{{ route('peserta.index') }}">Data Peserta</a>
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex">
                        @csrf
                        <button class="btn btn-outline-custom btn-sm px-3 py-2 rounded-3" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        @endauth
    @endif

    <div class="container my-4 my-md-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert" style="background-color: #ecfdf5; color: #047857;">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.js"></script>
</body>
</html>
