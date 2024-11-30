<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Ikon Flaticon -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-rounded/css/uicons-bold-rounded.css">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-foto {
            background-image: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),
                url('/images/FEB.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-foto flex items-center justify-center min-h-screen">
    <!-- Kontainer Utama -->
    <div class="flex flex-col items-center w-full sm:max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <!-- Ikon -->
        {{-- <div class="mt-6">
            <a href="/">
                <i class="fi fi-sr-member-list text-[100px] text-gray-700 dark:text-gray-300"></i>
            </a>
        </div> --}}

        <!-- Konten Dinamis -->
        <div class="w-full px-6 py-4">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
