<div>
    <div class="w-full lg:max-w-screen-md mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-10 lg:p-12">
            <form
                wire:submit.prevent="submit"
                class="space-y-16"
            >
                <div>
                    <h1 class="text-black font-bold text-xl capitalize">
                        data suvenir
                    </h1>
                    <div class="mt-8 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="title"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    judul
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan judul suvenir baru dengan singkat dan jelas
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="text" 
                                    wire:model="title"
                                    id="title"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('title')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="type"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    jenis suvenir
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tentukan jenis suvenir berdasarkan pilihan yang ada
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <select 
                                    wire:model="type"
                                    id="type"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                    <option value=""></option>
                                    @foreach ($types as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="description"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    deskripsi
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan deskripsi gambaran mengenai suvenir yang dimaksud
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <textarea 
                                    wire:model="description"
                                    id="description"
                                    class="w-full min-h-[150px] border-black/75 rounded-lg focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                ></textarea>
                                @error('description')
                                    <span class="block mt-0 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="price-starting-from"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    harga mulai
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan harga suvenir mulai dari yang paling murah
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="flex-shrink-0 px-3 py-2 rounded-lg border border-black"
                                    >
                                        Rp
                                    </span>
                                    <input 
                                        type="number" 
                                        wire:model="priceStartingFrom"
                                        id="price-starting-from"
                                        class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                    >
                                </div>
                                @error('priceStartingFrom')
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
                                    gambar utama
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan gambar utama yang menarik untuk menggambarkan suvenir
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <div class="flex items-start space-x-2">
                                            <div class="relative w-full h-32 rounded-md overflow-hidden">
                                                @if ($mainImage)
                                                    @error('mainImage')
                                                        <span class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                            <p class="text-true-gray-700 capitalize text-sm text-center">
                                                                unggah gambar utama
                                                            </p>
                                                        </span>
                                                    @else
                                                        <img 
                                                            src="{{ $mainImage->temporaryUrl() }}" 
                                                            class="w-full h-full object-cover"
                                                        >
                                                    @enderror
                                                @else
                                                    <div class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                        <p class="text-true-gray-700 capitalize text-sm text-center">
                                                            unggah gambar utama
                                                        </p>
                                                    </div>
                                                @endif
                                                <div
                                                    wire:loading
                                                    wire:target="mainImage"
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
                                                <input 
                                                    type="file" 
                                                    wire:model="mainImage" 
                                                    id="hero-image"
                                                    class="hidden"
                                                >
                                            </div>
                                        </div>
                                        @error('mainImage')
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
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    galeri gambar
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan beberapa gambar yang menggambarkan keistimewaan suvenir
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($galleries as $i => $image)
                                        <div class="col-span-1">
                                            <div class="flex items-start space-x-2">
                                                <div>
                                                    <div class="relative w-full h-32 rounded-md overflow-hidden">
                                                        @isset ($galleries[$i]['image'])
                                                            @error('galleries.' . $i . '.image')
                                                                <span class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                                    <p class="text-true-gray-700 capitalize text-sm text-center">
                                                                        unggah galeri gambar
                                                                    </p>
                                                                </span>
                                                            @else
                                                                <img 
                                                                    src="{{ $image['image']->temporaryUrl() }}" 
                                                                    class="w-full h-full object-cover"
                                                                >
                                                            @enderror
                                                        @else
                                                            <div class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                                <p class="text-true-gray-700 capitalize text-sm text-center">
                                                                    unggah galeri gambar
                                                                </p>
                                                            </div>
                                                        @endisset
                                                        <div
                                                            wire:loading
                                                            wire:target="galleries.{{ $i }}.image"
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
                                                    @error('galleries.' . $i . '.image')
                                                        <span class="block mt-2 text-xs text-red-600">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="space-y-2 flex-shrink-0">
                                                    @if (empty($galleries[$i]['image']) || $errors->has('galleries.' . $i . '.image'))
                                                        <div>
                                                            <label
                                                                for="galleries-{{ $i }}-image"
                                                                class="block text-black hover:text-true-gray-700 cursor-pointer"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                                </svg>
                                                            </label>
                                                            <input 
                                                                type="file" 
                                                                wire:model="galleries.{{ $i }}.image" 
                                                                id="galleries-{{ $i }}-image"
                                                                class="hidden"
                                                            >
                                                        </div>
                                                    @endif
                                                    <a 
                                                        href="#"
                                                        wire:click.prevent="deleteGelleryImage({{ $i }})"
                                                        class="inline-block {{ count($galleries) == 1 ? 'text-true-gray-400 cursor-default' : 'text-black hover:text-true-gray-700' }}"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                                            <path d="M10 10l4 4m0 -4l-4 4"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($galleries) < 6)
                                    <div class="mt-4">
                                        <a 
                                            href="#"
                                            wire:click.prevent="addGelleryImage"
                                            class="inline-flex items-center space-x-2 text-black group"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                                <line x1="9" y1="12" x2="15" y2="12"></line>
                                                <line x1="12" y1="9" x2="12" y2="15"></line>
                                            </svg>
                                            <span class="text-sm capitalize group-hover:underline">
                                                tambah galeri gambar
                                            </span>
                                        </a>
                                    </div>
                                @endif
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
                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-true-gray-800 hover:bg-true-gray-700 focus:outline-none focus:ring focus:ring-true-gray-700/30 text-white text-base capitalize"
                        >
                            simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
