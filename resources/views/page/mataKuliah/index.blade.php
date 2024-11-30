<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex flex-col lg:flex-row p-4 lg:p-0">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg lg:w-1/2 p-4 w-full">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT MATA KULIAH
                    </div>
                    <div>
                        <form class="w-full" method="POST" action="{{ route('mataKuliah.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="KodeMataKuliah"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Mata Kuliah</label>
                                <input type="text" name="KodeMataKuliah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Kode Genre" value="{{ $kodeMataKuliah }}" readonly required />
                            </div>
                            <div class="mb-5">
                                <label for="MataKuliah"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                                    Kuliah</label>
                                <input type="text" name="MataKuliah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Mata Kuliah" oninput="toUppercase(this)"/>
                            </div>
                            <div class="mb-5">
                                <label for="JumlahPertemuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                    Pertemuan</label>
                                <input type="number" name="JumlahPertemuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Jumlah Pertemuan" />
                            </div>
                            <button type="submit"
                                class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4 w-full">
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
                                            <td class="px-6 py-4 bg-gray-100 text-center">
                                                <a href="{{ route('mahasiswa.showMataKuliah', ['kodeMataKuliah' => Str::slug($d->MataKuliah)]) }}">
                                                    <i class="fi fi-br-link-horizontal"></i>
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-2">
                                                    <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $d->id }}" data-kodematakuliah="{{ $d->KodeMataKuliah }}"
                                                    data-matakuliah="{{ $d->MataKuliah }}" data-jumlahpertemuan="{{ $d->JumlahPertemuan }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return dataDelete('{{ $d->id }}','{{ $d->MataKuliah }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah</label>
                            <input type="text" id="MataKuliah" name="MataKuliah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Mata Kuliah disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pertemuan</label>
                            <input type="number" id="JumlahPertemuan" name="JumlahPertemuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Jumlah Pertemuan disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const MataKuliah = button.dataset.matakuliah;
            const JumlahPertemuan = button.dataset.jumlahpertemuan;

            let url = "{{ route('mataKuliah.update', ':id') }}".replace(':id', id);
            console.log(url);

            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Mata Kuliah ${MataKuliah}`;
            document.getElementById('MataKuliah').value = MataKuliah;
            document.getElementById('JumlahPertemuan').value = JumlahPertemuan;

            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            status.classList.toggle('hidden');
        }

        const dataDelete = async (id, MataKuliah) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Genre ${MataKuliah} ?`);
            if (tanya) {
                await axios.post(`/mataKuliah/${id}`, {
                        '_method': 'DELETE',
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

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
    <script>
        function toUppercase(element) {
            element.value = element.value.toUpperCase();
        }
    </script>
</x-app-layout>
