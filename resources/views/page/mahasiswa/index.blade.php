<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $data->pertemuan->matkul->MataKuliah }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-straight/css/uicons-solid-straight.css'>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sidebar collapse styles */
        #sidebar {
            transition: width 0.3s ease;
        }

        #sidebar.w-20 {
            width: 5rem;
            /* Width when collapsed */
        }

        /* Initially hide dropdown */
        .hidden {
            display: none;
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            padding-left: 1rem;
        }

        /* Ensure icons are adjusted in collapsed state */
        #sidebar.w-20 .dropdown-menu {
            padding-left: 0.5rem;
        }

        #sidebar.w-20 .matkul {
            display: none;
            /* font-size: 12px;
            text-wrap: wrap; */
            /* Atau sembunyikan nama jika terlalu kecil */
        }

        #sidebar.w-20 .pertemuan {
            display: none;
            /* font-size: 12px;
            text-wrap: wrap; */
            /* Atau sembunyikan nama jika terlalu kecil */
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md" id="sidebar">
            <div class="p-4">
                <h2 class="text-md font-semibold text-gray-700 dark:text-gray-200 bg-emerald-200 p-2 text-wrap">
                    <i class="fi fi-ss-book-bookmark mr-4"></i> <span
                        class="matkul">{{ $data->pertemuan->matkul->MataKuliah }}</span>
                </h2>
                <ul class="mt-4 space-y-2">
                    <!-- Dropdown Menu -->
                    @foreach ($pertemuan as $p)
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md dropdown-toggle">
                                <i class="fi fi-sr-chalkboard-user mr-4 mt-1"></i>
                                <span class="pertemuan"> Pertemuan {{ $p->pertemuan }}</span>
                            </a>
                            <ul class="dropdown-menu hidden pl-6 space-y-2">
                                @foreach ($materi->where('KodePertemuan', $p->KodePertemuan) as $m)
                                    <li>
                                        <a href="{{ route('mahasiswa.edit', $m->KodeMateri) }}"
                                            class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                                            <i class="fi fi-sr-circle mr-4 mt-1"></i> <span class="pertemuan">{{ $m->judul }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <!-- Button to collapse sidebar -->
        <button id="sidebar-toggle" class="p-2 text-gray-700 dark:text-gray-300 flex items-start justify-start">
            <i class="fi fi-br-menu-burger flex items-start justify-start"></i>
        </button>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle dropdown
            $('.dropdown-toggle').on('click', function() {
                $(this).next('.dropdown-menu').toggleClass('hidden');
            });

            // Collapse/expand sidebar
            $('#sidebar-toggle').on('click', function() {
                $('#sidebar').toggleClass('w-64 w-20'); // Change the width of the sidebar
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
