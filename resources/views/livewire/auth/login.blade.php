<div class="w-full md:w-96 lg:w-full min-h-[300px] rounded-xl shadow-lg overflow-hidden bg-white flex">
    <div class="hidden lg:block relative lg:w-96 h-auto bg-red-50 flex-shrink-0">
        <img 
            src="{{ asset('storage/images/heroes/login.jpg') }}" 
            alt="hero"
            class="relative w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-600/75 to-cyan-800/75"></div>
        <div class="absolute h-full w-full inset-0 flex items-center justify-center">
            <x-logo class="w-48 text-white" />
        </div>
    </div>
    <div class="relative w-full p-10">
        <form
            wire:submit.prevent="submit"
            class="space-y-10"
        >
            <div>
                <h1 class="text-black font-bold text-2xl capitalize">
                    autentikasi
                </h1>
                <div class="mt-8 space-y-6">
                    <div class="grid grid-cols-1 gap-1">
                        <div class="col-span-1">
                            <label 
                                for="email"
                                class="block mb-1 text-black font-medium capitalize"
                            >
                                email
                            </label>
                        </div>
                        <div class="col-span-1">
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
                    <div class="grid grid-cols-1 gap-1">
                        <div class="col-span-1">
                            <label 
                                for="password"
                                class="block mb-1 text-black font-medium capitalize"
                            >
                                kata sandi
                            </label>
                        </div>
                        <div class="col-span-1">
                            <input 
                                type="password" 
                                wire:model="password"
                                id="password"
                                class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                            >
                            @error('password')
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
                    <div class="flex items-center space-x-3 px-3 py-2 rounded-md bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 9v2m0 4v.01"></path>
                            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
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
                            masuk
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>