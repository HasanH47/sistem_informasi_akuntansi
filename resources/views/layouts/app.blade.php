<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for Navbar */
        .navbar {
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus,
        .navbar-toggler:active {
            outline: none;
            box-shadow: none;
        }

        /* Custom CSS for Footer */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }   
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img src="{{ asset('/assets/images/logos/favicon.png') }}" alt="Logo" width="30" height="30"
                    class="d-inline-block align-top">
                SIA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        @if (Auth::check())
                            <a class="nav-link" href="{{ route('dashboards.index') }}">Dashboard</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Sistem Informasi Akuntansi, Developed by HasanH47. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
