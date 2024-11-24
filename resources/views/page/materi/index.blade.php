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
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold w-full">
                        <div class="flex items-center justify-between w-full">
                            <div class="w-full ">
                                MATERI
                            </div>
                            <div class="w-full text-right">
                                <a href="{{ route('detailMateri.show', $dataKodePertemuan) }}"
                                    class="mr-2 bg-green-500 hover:bg-green-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                                    <i class="fi fi-sr-add"></i>
                                </a>
                            </div>
                        </div>
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
                                            KODE MATERI
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            KODE PERTEMUAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            PERTEMUAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JUDUL
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            MATERI
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
                                                {{ $d->KodeMateri }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $d->KodePertemuan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $d->pertemuan->pertemuan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $d->judul }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $d->materi }}
                                                <a href="{{ route('mataKuliah.show', $d->id) }}" class="bg-emerald-500 hover:bg-emerald-600 px-3 py-1 rounded-xl text-xs text-white w-10 h-10 flex items-center justify-center"><i class="fi fi-ss-book-open-cover"></i></a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-1">
                                                    <div class="w-full mt-2">
                                                        <a href="{{ route('detailMateri.edit', $d->id) }}"
                                                            class="mr-2 bg-green-500 hover:bg-green-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                                                            <i class="fi fi-sr-pen-circle"></i>
                                                        </a>
                                                    </div>
                                                    <button
                                                        class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                        onclick="return dataDelete('{{ $d->id }}','{{ $d->judul }}')">
                                                        <i class="fi fi-sr-cross-circle"></i>
                                                    </button>
                                                </div>
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
    <script>
        const dataDelete = async (id, MataKuliah) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus materi ${MataKuliah} ?`);
            if (tanya) {
                await axios.post(`/detailMateri/${id}`, {
                        '_method': 'DELETE',,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
