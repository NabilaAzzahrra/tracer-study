<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-5">
                <div class="w-full">
                    <div>
                        <div class="p-4 bg-amber-200 w-64 h-24 rounded-2xl shadow-lg">
                            <div class="flex items-center justify-center">
                                <div class="w-full text-[45px] font-bold ml-6">{{ count($dataMatkul) }}</div>
                                <div class="w-full text-xl text-wrap font-bold mr-4 ml-8">
                                    Mata Kuliah
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 mt-4 rounded-xl">
                        <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                            MATA KULIAH
                        </div>
                        <div>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-100">
                                                NO
                                            </th>
                                            <th scope="col" class="px-6 py-3 ">
                                                MATA KULIAH
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-100 text-center">
                                                LINK
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data as $d)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                    {{ $no++ }}
                                                </th>
                                                <td class="px-6 py-4 ">
                                                    {{ $d->MataKuliah }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-100 text-center">
                                                    <a href="http://127.0.0.1:8000/materi/{{ str_replace(' ', '-', strtolower($d->MataKuliah)) }}"
                                                        target="_blank"><i class="fi fi-br-link-horizontal"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full font-bold">
                    <h1 class="text-2xl text-black font-bold mb-4 uppercase">Selamat Datang di Sistem Pencatatan Materi Kuliah!</h1>
                    <div class="text-justify text-[18px]">
                        Platform ini dirancang untuk membantu Anda mencatat dan mengelola materi perkuliahan dengan mudah dan efisien.
                    Dengan sistem ini, Anda dapat menyimpan semua materi kuliah secara terorganisir, mengakses catatan kapan saja
                    dan di mana saja, serta berbagi informasi penting dengan rekan-rekan kuliah. Jadikan proses belajar Anda lebih
                    terstruktur, produktif, dan menyenangkan bersama kami! 🎓
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
