<div>
    <div class="w-full lg:max-w-screen-md mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-10 lg:p-12">
            <form
                wire:submit.prevent="submit"
                class="space-y-16"
            >
                <div>
                    <h1 class="text-black font-bold text-xl capitalize">
                        data akun
                    </h1>
                    <div class="mt-8 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="name"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    nama lengkap
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan nama lengkap anda dengan benar dan jelas
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="text" 
                                    wire:model="name"
                                    id="name"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('name')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="email"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    email
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan email valid dengan format lengkap dan benar
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="text" 
                                    wire:model="email"
                                    id="email"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('email')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    foto profil
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan foto profil terbaik anda
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <div class="flex items-start space-x-2">
                                            <div class="relative w-full h-32 rounded-md overflow-hidden">
                                                @if ($profilePicture)
                                                    @error('profilePicture')
                                                        <span class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                            <p class="text-true-gray-700 capitalize text-sm text-center">
                                                                unggah gambar utama
                                                            </p>
                                                        </span>
                                                    @else
                                                        <img 
                                                            src="{{ $profilePicture->temporaryUrl() }}" 
                                                            class="w-full h-full object-cover"
                                                        >
                                                    @enderror
                                                @else
                                                    <img 
                                                        src="{{ asset('storage/images/users/' . auth()->user()->profile_picture) }}" 
                                                        class="w-full h-full object-cover"
                                                    >
                                                @endif
                                                <div
                                                    wire:loading
                                                    wire:target="profilePicture"
                                                    class="absolute w-full h-full inset-0 border border-black/75 rounded-md"
                                                >
                                                    <div class="w-full h-full flex items-center justify-center bg-true-gray-100 rounded-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black animate-spin" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <label
                                                    for="hero-image"
                                                    class="block text-black hover:text-true-gray-700 cursor-pointer"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                    </svg>
                                                </label>
                                                <div wire:ignore>
                                                    <input 
                                                        type="file" 
                                                        wire:model="profilePicture" 
                                                        id="hero-image"
                                                        class="hidden"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        @error('profilePicture')
                                            <span class="block mt-2 text-xs text-red-600">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="confirm-password"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    konfirmasi kata sandi
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Untuk melakukan penyimpanan perubahan data, harap masukkan kembali konfirmasi kata sandi akun anda
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="password" 
                                    wire:model="confirmPassword"
                                    id="confirm-password"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('confirmPassword')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    @if ($validationFailed)
                        <div class="flex items-center space-x-3 px-3 py-2 rounded-md bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 9v2m0 4v.01"></path>
                                <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                            </svg>
                            <p class="text-sm font-medium text-black">
                                Pastikan semua inputan sudah diisi dengan lengkap dan benar
                            </p>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="flex items-center space-x-3 px-3 py-2 rounded-md bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                <path d="M9 12l2 2l4 -4"></path>
                            </svg>
                            <p class="text-sm font-medium text-black">
                                {{ session('message') }}
                            </p>
                        </div>
                    @endif
                    <div class="text-right">
                        <div wire:ignore>
                            <button
                                type="submit"
                                class="px-4 py-2 rounded-lg bg-true-gray-800 hover:bg-true-gray-700 focus:outline-none focus:ring focus:ring-true-gray-700/30 text-white text-base capitalize"
                            >
                                simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>