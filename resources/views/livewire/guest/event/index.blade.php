<div>
    <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0 h-96">
        <div class="w-full h-full flex items-center justify-center md:justify-start">
            <div class="space-y-6 w-full md:w-[500px] lg:w-[600px] text-center md:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                    event
                </h1>
                <p class="text-white/80 leading-7 text-base lg:text-lg">
                    Cari tahu banyak mengenai event-event yang akan berlangsung bulan ini, untuk melengkapi liburan anda
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
        </div>
    </div>
    <div class="space-y-16 py-16">
        <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0 mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($events as $event)
                    <div class="col-span-1">
                        <a 
                            href="{{ route('guest.event.details', $event) }}"
                            class="group"
                        >
                            <div class="relative w-80 md:w-full lg:w-80 mx-auto h-80">
                                <div class="absolute top-0 w-full h-60 rounded-xl overflow-hidden">
                                    <img 
                                        src="{{ asset('storage/images/events/' . $event->main_image) }}" 
                                        alt="default" 
                                        class="absolute w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                    >
                                    <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-transparent via-transparent to-black/30"></div>
                                </div>
                                <div class="absolute h-48 bottom-0 p-4 overflow-hidden">
                                    <div class="relative w-full h-full p-6 bg-white rounded-xl shadow-lg">
                                        <h6 class="text-lg text-black font-light leading-7">
                                            {{ Str::limit($event->title, 60, '...') }}
                                        </h6>
                                    </div>
                                    <div class="absolute bottom-10 right-10">
                                        <span class="text-pink-600 uppercase font-light text-xs px-3 py-1 rounded-lg bg-pink-50">
                                            {{ $event->start_date->isoFormat('DD MMMM YYYY') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="w-full md:w-[450px] px-8 pt-8 pb-12 md:px-10 md:pt-10 md:pb-14 bg-white rounded-lg shadow-xl">
                        <div class="text-pink-600 space-y-2 flex flex-col items-center">
                            <x-logo class="w-20 mb-3" />
                            <h1 class="text-xl font-light">
                                Tidak ada data ditemukan
                            </h1>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="pt-10">
                {{ $events->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        
    </script>
@endpush
