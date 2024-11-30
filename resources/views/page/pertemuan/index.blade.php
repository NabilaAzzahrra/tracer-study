<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
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
                                        <th scope="col" class="px-6 py-3">
                                            KODE MATA KULIAH
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            MATA KULIAH
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JUMLAH PERTEMUAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            LINK
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
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
                                            <td class="px-6 py-4">
                                                {{ $d->KodeMataKuliah }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $d->MataKuliah }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $d->JumlahPertemuan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                <a href="http://127.0.0.1:8000/materi/{{ str_replace(' ', '-', strtolower($d->MataKuliah)) }}" target="_blank">Link</a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('pertemuan.show', $d->KodeMataKuliah) }}"
                                                    class="mr-2 bg-green-500 hover:bg-green-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                                                    <i class="fi fi-ss-eye"></i>
                                                </a>
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
        </div>
    </div>
</x-app-layout>
