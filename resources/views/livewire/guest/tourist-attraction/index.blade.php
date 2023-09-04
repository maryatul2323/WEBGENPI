<div>
    <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0 h-96">
        <div class="w-full h-full flex flex-col justify-center">
            <div class="space-y-6 w-full md:w-[500px] lg:w-[600px] text-center md:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                    objek wisata
                </h1>
                <p class="text-white/80 leading-7 text-base lg:text-lg">
                    Temukan objek wisata menarik yang terdapat di Kabupaten Bengkalis, sangat cocok untuk menghabiskan waktu bersama keluarga tercinta
                </p>
                <div class="flex items-center space-x-3">
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
            <div class="w-full mt-6">
                <div class="flex items-center pb-4 space-x-2 overflow-hidden overflow-x-auto whitespace-nowrap">
                    <a 
                        href="#"
                        wire:click.prevent="filter"
                        class="px-4 py-1 text-sm md:text-base rounded-2xl bg-white {{ empty($travelObjectCategory) ? 'bg-opacity-70 text-purple-700' : 'bg-opacity-20 hover:bg-opacity-30 text-white' }}"
                    >
                        Semua
                    </a>
                    @foreach ($travelObjectCategories as $item)
                    <a 
                        href="#"
                        wire:click.prevent="filter({{ $item->id }})"
                        class="px-4 py-1 text-sm md:text-base rounded-2xl bg-white {{ $travelObjectCategory == $item->id ? 'bg-opacity-70 text-purple-700' : 'bg-opacity-20 hover:bg-opacity-30 text-white' }}"
                    >
                        {{ $item->category }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-16 py-16">
        <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0 mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($touristAttractions as $touristAttraction)
                    <div class="col-span-1">
                        <a href="{{ route('guest.touristAttraction.details', $touristAttraction) }}">
                            <div class="relative w-72 mx-auto md:w-full h-80 rounded-xl overflow-hidden shadow-xl group">
                                <img 
                                    src="{{ asset('storage/images/travel-objects/' . $touristAttraction->main_image) }}" 
                                    alt="default" 
                                    class="relative w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                >
                                <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                <div class="absolute w-full p-5 top-0 flex items-center justify-between">
                                    <p class="text-xs px-2 py-1 rounded-md bg-white bg-opacity-20 text-white">
                                        {{ $touristAttraction->travelObjectCategory->category }}
                                    </p>
                                </div>
                                <div class="absolute w-full p-5 bottom-0 space-y-4">
                                    <h6 class="text-lg text-white font-light leading-6">
                                        {{ $touristAttraction->title }}
                                    </h6>
                                    <div class="flex items-center space-x-2 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="11" r="3"></circle>
                                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                        </svg>
                                        <span class="capitalize text-xs truncate">
                                            {{ $touristAttraction->location }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="w-full md:w-[450px] px-8 pt-8 pb-12 md:px-10 md:pt-10 md:pb-14 bg-white rounded-lg shadow-xl">
                        <div class="text-purple-600 space-y-2 flex flex-col items-center">
                            <x-logo class="w-20 mb-3" />
                            <h1 class="text-xl font-light">
                                Tidak ada data ditemukan
                            </h1>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="pt-10">
                {{ $touristAttractions->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        
    </script>
@endpush
