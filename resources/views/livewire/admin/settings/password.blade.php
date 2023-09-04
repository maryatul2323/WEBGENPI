<div>
    <div class="w-full lg:max-w-screen-md mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-10 lg:p-12">
            <form
                wire:submit.prevent="submit"
                class="space-y-16"
            >
                <div>
                    <h1 class="text-black font-bold text-xl capitalize">
                        data kata sandi
                    </h1>
                    <div class="mt-8 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="new-password"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    kata sandi baru
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan kata sandi baru anda minimal 6 karakter
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="password" 
                                    wire:model="newPassword"
                                    id="new-password"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('newPassword')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="repeat-password"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    ulangi kata sandi
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Ulangi kata sandi baru anda kembali
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="password" 
                                    wire:model="repeatPassword"
                                    id="repeat-password"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('repeatPassword')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
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
                                    Untuk melakukan penyimpanan perubahan kata sandi baru, harap masukkan kembali konfirmasi kata sandi lama akun anda
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