<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        .background-section {
            background-image: url('/images/FEBs.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-foto {
            background-image: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),
                url('/images/FEB.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <title>Sistem Pencatatan Materi Kuliah</title>
</head>

<body class="bg-foto flex items-center justify-center">
    <!-- Kontainer Utama -->
    <div class="background-section px-4">
        <!-- Flex Container -->
        <div class="flex items-center border-4 border-white rounded-lg shadow-lg p-6 max-w-4xl">
            <!-- Kolom Teks -->
            <div class="flex-1  mr-8">
                <h1 class="text-2xl text-black font-bold mb-4 uppercase">Selamat Datang di Sistem Pencatatan Materi Kuliah!</h1>
                <p class="font-bold text-lg text-justify">
                    Platform ini dirancang untuk membantu Anda mencatat dan mengelola materi perkuliahan dengan mudah dan efisien.
                    Dengan sistem ini, Anda dapat menyimpan semua materi kuliah secara terorganisir, mengakses catatan kapan saja
                    dan di mana saja, serta berbagi informasi penting dengan rekan-rekan kuliah. Jadikan proses belajar Anda lebih
                    terstruktur, produktif, dan menyenangkan bersama kami! 🎓
                </p>
            </div>

            <!-- Kolom Login -->
            <div>
                <a href="{{ url('/dashboard') }}">
                    <div
                        class="bg-blue-500 hover:bg-green-600 transition duration-500 text-white rounded-lg shadow-lg p-6 w-48 text-center">
                        <i class="fa fa-user text-4xl mb-4"></i>
                        <span class="text-lg font-bold">Login</span>
                    </div>
                </a>
            </div>
            <div class="ml-4">
                <a href="simatkul.nyalse.id/materi/kewirausahaan-(pjbl)">
                    <div
                        class="bg-blue-500 hover:bg-green-600 transition duration-500 text-white rounded-lg shadow-lg p-6 w-48 text-center">
                        <i class="fa fa-file text-4xl mb-4"></i>
                        <span class="text-lg font-bold">Materi</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
