<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white  gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                        <div class="ms-1 ml-[15px]">
                            <img src="{{ url('images/user.png') }}" alt="" srcset=""
                                class="lg:w-20 w-14">
                        </div>
                        <div class="mt-2">
                            <div class="font-bold">{{ $admin->name }}</div>
                            <div>{{ $admin->email }}</div>
                            <div class="text-sm">Administrator</div>
                        </div>
                    </div>
                    <div class="p-4 gap-5 bg-gray-100 rounded-xl mt-4">
                        <div
                            class="bg-sky-200 p-2 border border-2 border-black rounded-xl w-full text-center font-bold">
                            SETTING PASSWORD</div>
                        <div>
                            <form action="{{ route('profile.updatePass', $admin->id) }}" method="post"
                                id="passwordForm">
                                @csrf
                                @method('PATCH')
                                <div class="p-4 rounded-xl">
                                    <div class="lg:flex-row gap-5">
                                        <div class="flex flex-col lg:flex-row gap-5 w-full">
                                            <div class="lg:mb-5 w-full relative">
                                                <label for="newPassword"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                    Baru</label>
                                                <input type="password" id="newPassword" name="newPassword"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Password Baru" />
                                                <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                    id="toggleNewPassword"></i>
                                            </div>
                                            <div class="lg:mb-5 w-full relative">
                                                <label for="konfirPassword"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                    Password</label>
                                                <input type="password" id="konfirPassword" name="konfirPassword"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Konfirmasi Password" />
                                                <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                    id="toggleConfirmPassword"></i>
                                                <span id="passwordError" class="text-red-500 text-sm hidden">Passwords
                                                    do not match!</span>
                                                <span id="passwordMatch"
                                                    class="text-green-500 text-sm hidden">Passwords match!</span>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
