<div>
    <div class="max-w-xl lg:max-w-screen-md mx-auto">
        <div class="text-center md:text-left mb-16 space-y-6">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                penginapan
            </h1>
            <p class="text-white/80 leading-7 text-base lg:text-lg">
                Anda dapat melakukan pengelolaan data-data penginapan seperti menambahkan data penginapan baru, mengubah data-data yang sudah ada ataupun menghapus data penginapan yang sudah tidak relevan
            </p>
            <div class="flex items-center space-x-3">
                <a 
                    href="{{ route('admin.lodging.create') }}"
                    class="flex-shrink-0 px-4 py-3 bg-white bg-opacity-30 hover:bg-opacity-50 focus:outline-none focus:ring focus:ring-white/40 rounded-lg font-medium border-2 border-white/20 text-white text-sm capitalize"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </a>
                <div class="relative w-full lg:w-96">
                    <input 
                        type="text"
                        wire:model="search"
                        class="relative w-full px-4 pl-12 py-3  bg-white bg-opacity-5 border-2 border-white/20 focus:outline-none focus:ring focus:ring-white/30 focus:border-white/5 rounded-lg font-medium text-white placeholder-white text-sm"
                        placeholder="Pencarian..."
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute top-3 left-3 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                </div>
            </div>
        </div>
        <div class="space-y-6">
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @forelse ($lodgings as $lodging)
                    <div class="col-span-1">
                        <a 
                            href="{{ route('admin.lodging.details', $lodging) }}"
                            class="group"
                        >
                            <div class="relative w-full md:w-96 lg:w-full mx-auto">
                                <div class="relative w-full h-44 bg-white shadow-lg rounded-xl overflow-hidden flex">
                                    <div class="relative w-32 h-full overflow-hidden flex-shrink-0">
                                        <img 
                                            src="{{ asset('storage/images/lodgings/' . $lodging->main_image) }}" 
                                            alt="{{ $lodging->title }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                        >
                                    </div>
                                    <div class="relative w-full h-full">
                                        <div class="p-5 relative">
                                            <h6 class="text-lg text-black font-light leading-6">
                                                {{ Str::limit($lodging->title, 80, '...') }}
                                            </h6>
                                        </div>
                                        <div class="absolute bottom-0 p-5 pt-0 w-full">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-1 text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                                                        <circle cx="9" cy="9" r="2"></circle>
                                                    </svg>
                                                    <p class="uppercase font-bold text-sm">
                                                        {{ 'rp ' . number_format($lodging->price_starting_from, 0, '.', ',') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>                                   
                                    </div>
                                </div>
                                <div class="absolute bottom-5 right-5">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.lodging.edit', $lodging) }}" class="text-black hover:text-opacity-75">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                            </svg>
                                        </a>
                                        <div
                                            x-data="{ open: false }"
                                            x-effect="open ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')"
                                        >
                                            <a 
                                                href="#" 
                                                class="text-black hover:text-opacity-75"
                                                @click.prevent="open = true"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </a>
                                            <div 
                                                :class="{ 'hidden': !open }"
                                                class="hidden fixed w-full h-screen px-4 inset-0 bg-black/50 z-10"
                                            >
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <div class="w-[500px] px-8 pt-8 pb-12 md:px-10 md:pt-10 md:pb-14 bg-white rounded-lg whitespace-normal text-left">
                                                        <h1 class="text-true-gray-800 text-2xl leading-10">
                                                            Yakin ingin hapus data "{{ $lodging->title }}"?
                                                        </h1>
                                                        <div class="mt-14 text-right space-x-2">
                                                            <a 
                                                                href="#"
                                                                class="px-4 py-2 rounded-lg bg-true-gray-100 hover:bg-true-gray-200 focus:outline-none focus:ring focus:ring-true-gray-200/30 text-black text-base capitalize"
                                                                @click.prevent="open = false"
                                                            >
                                                                batal
                                                            </a>
                                                            <a 
                                                                href="#"
                                                                wire:click.prevent="delete({{ $lodging }})"
                                                                class="px-4 py-2 rounded-lg bg-true-gray-800 hover:bg-true-gray-700 focus:outline-none focus:ring focus:ring-true-gray-700/30 text-white text-base capitalize"
                                                            >
                                                                hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="w-full md:w-[450px] px-8 pt-8 pb-12 md:px-10 md:pt-10 md:pb-14 bg-white rounded-lg shadow-xl">
                        <div class="text-green-600 space-y-2 flex flex-col items-center">
                            <x-logo class="w-20 mb-3" />
                            <h1 class="text-xl font-light">
                                Tidak ada data ditemukan
                            </h1>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="pt-10">
                {{ $lodgings->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
