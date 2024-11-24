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
                                FORM INPUT MATERI
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <form class="w-full" action="{{ route('detailMateri.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5 w-full">
                                <label for="KodeMateri"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Materi</label>
                                <input type="text" id="KodeMateri" name="KodeMateri"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" value="{{ $KodeMateri }}" required  readonly/>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="KodePertemuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Pertemuan</label>
                                <input type="text" id="KodePertemuan" name="KodePertemuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required readonly value="{{ request()->segment(2) }}" />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="judul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                <input type="text" id="judul" name="judul"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="materi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi</label>
                                <input type="file" id="materi" name="materi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
