<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Doto</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{!! url('assets/bootstrap/bootstrap.min.css') !!}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{!! url('assets/fontawesome/css/all.css') !!}">

    {{-- my css --}}
    <link rel="stylesheet" href="{!! url('assets/css/main.css') !!}">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>

    <main class="main-container">
        @yield('content')
    </main>

</body>

</html>
