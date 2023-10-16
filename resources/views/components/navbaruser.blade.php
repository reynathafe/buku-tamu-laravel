<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- CSS for the logo -->
    <style>
        .navbar-custom {
            background-color: #b5cde6; 
        }
        .navbar-logo {
            max-width: 70px; 
            margin-right: 40px; 
        }
        .navbar-brand {
            font-family: 'Arial', sans-serif; 
            font-size: 24px; 
            font-weight: bold; 
        }

        .navbar-custom .navbar-brand {
            color: #4c7199 !important; 
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom"> 
        <a class="navbar-brand" >
            <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="navbar-logo">
            ULTG RANGKAS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('guests.create') }}">Tambah Data Tamu</a> --}}
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap and other JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Other scripts -->
    <!-- Add any other JavaScript files you need -->

</body>
</html>
