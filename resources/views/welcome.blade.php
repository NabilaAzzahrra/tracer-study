<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
.bannerFondo{
        height: 400px;
        width: 1500px;
}
.background-section {
    background-image: url('/images/FEB.jpg'); /* Ganti dengan path gambar Anda */
    background-size:contain ; /* Gambar menyesuaikan ukuran elemen */
    background-position: center; /* Gambar diposisikan di tengah */
    background-repeat: no-repeat; /* Gambar tidak diulang */
    height: 900px; /* Tinggi section */
    width: 1500px;
    display: flex;
    align-items: center; /* Pusatkan konten vertikal */
    justify-content: center; /* Pusatkan konten horizontal */
    margin-top: 0px; /* Tambahkan jarak ke bawah */
}
</style>
<div>      
	<div class="background-section bg-bottom inset-0 bg-gray-400 bg-opacity-2 h-96" >
    </div>
      <div class="-mt-64">
        <div class="w-full text-center">
      </div>    
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 ">
    
          <div class="p-2 sm:p-10 text-center">
              <a href="{{ url('/dashboard') }}">
              <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-green-600 transition duration-500  bg-white">
                  <div class="space-y-10">
                      <i class="fa fa-user" style="font-size:48px;"></i>   
                      <div class="px-6 py-4">
                          <div class="space-y-5">
                              <div class="font-bold text-xl mb-2">
                                <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                                </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </a>
          </div>
 
  
          <div class="p-2 sm:p-10 text-center text-black"> 
            <a href="{{ route('register') }}">
              <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-white hover:bg-green-600 transition duration-500">
                  <div class="space-y-10">
                    <i class="fa fa-pen-nib" style="font-size:48px;"></i>
                      <div class="px-6 py-4">
                          <div class="space-y-5">
                              <div class="font-bold text-xl mb-2">
                                <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </a>
          </div>
  
          <div class="p-2 sm:p-10 text-center translate-x-2">
            <a href="{{ route('login') }}">
              <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-green-600 transition duration-500 bg-white ">
                  <div class="space-y-10">
                      <i class="fa fa-book" style="font-size:48px;"></i>
                      <div class="px-6 py-4">
                          <div class="space-y-5">
                              <div class="font-bold text-xl mb-2">
                                <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Mata Kuliah
                            </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </a>
          </div>
  
      </div>
      </div>
  
  </div>
</body>
</html>
