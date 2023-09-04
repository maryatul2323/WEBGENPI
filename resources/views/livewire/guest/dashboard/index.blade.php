<div>
    <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0 h-96">
        <div class="w-full h-full flex items-center justify-center md:justify-start">
            <div class="space-y-6 w-full md:w-[500px] lg:w-[600px] text-center md:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                    GenPi Bengkalis
                </h1>
                <p class="text-white/80 leading-7 text-base lg:text-lg">
                    Telusuri keindahan pesona alam, nyamannya objek wisata, event-event menarik, tempat penginapan yang cocok, makanan serta cendramata khas Bengkalis disini
                </p>
            </div>
        </div>
    </div>
    <div class="space-y-16 py-16">
        @if (count($naturalCharms) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                pesona alam
                            </h1>
                            <a 
                                href="{{ route('guest.naturalCharm.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="natural-charm" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($naturalCharms as $naturalCharm)
                                    <div class="swiper-slide">
                                        <a href="{{ route('guest.naturalCharm.details', $naturalCharm) }}">
                                            <div class="relative w-full h-96 rounded-xl overflow-hidden shadow-xl group">
                                                <img 
                                                    src="{{ asset('storage/images/travel-objects/' . $naturalCharm->main_image) }}" 
                                                    alt="default" 
                                                    class="relative w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                                >
                                                <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                <div class="absolute w-full p-5 bottom-0 space-y-4">
                                                    <h6 class="text-lg text-white font-light leading-6">
                                                        {{ $naturalCharm->title }}
                                                    </h6>
                                                    <div class="flex items-center space-x-2 text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <circle cx="12" cy="11" r="3"></circle>
                                                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                                        </svg>
                                                        <span class="capitalize text-xs truncate">
                                                            {{ $naturalCharm->location }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="natural-charm-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="natural-charm-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($touristAttractions) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                objek wisata
                            </h1>
                            <a 
                                href="{{ route('guest.touristAttraction.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="tourist-attraction" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($touristAttractions as $touristAttraction)
                                    <div class="swiper-slide">
                                        <a href="{{ route('guest.touristAttraction.details', $touristAttraction) }}">
                                            <div class="relative w-full h-96 rounded-xl overflow-hidden shadow-xl group">
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
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="tourist-attraction-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="tourist-attraction-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($travels) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                travel
                            </h1>
                            <a 
                                href="{{ route('guest.travel.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="travel" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($travels as $travel)
                                    <div class="swiper-slide">
                                        <a 
                                            href="{{ route('guest.travel.details', $travel) }}"
                                            class="group"
                                        >
                                            <div class="relative w-full h-80 rounded-xl overflow-hidden shadow-xl group">
                                                <div class="absolute top-0 w-full h-56 overflow-hidden">
                                                    <img 
                                                        src="{{ asset('storage/images/travels/' . $travel->main_image) }}" 
                                                        alt="default" 
                                                        class="absolute w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                                    >
                                                    <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                    <div class="absolute p-5 pb-2 bottom-0 right-0">
                                                        <p class="flex items-center justify-end mb-2 space-x-1 text-white px-2 py-1 rounded-lg bg-white/30">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                                                                <circle cx="9" cy="9" r="2"></circle>
                                                            </svg>
                                                            <span class="uppercase tracking-wider text-xs">
                                                                mulai rp {{ number_format($travel->price_starting_from, 0, '.', ',') }}
                                                            </span>
                                                        </p>    
                                                    </div>
                                                </div>
                                                <div class="absolute h-24 bottom-0 p-5">
                                                    <h6 class="text-lg text-black font-light leading-7">
                                                        {{ Str::limit($travel->title, 60, '...') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="travel-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="travel-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($events) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                event
                            </h1>
                            <a 
                                href="{{ route('guest.event.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="event" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($events as $event)
                                    <div class="swiper-slide">
                                        <a 
                                            href="{{ route('guest.event.details', $event) }}"
                                            class="group"
                                        >
                                            <div class="relative w-full h-80">
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
                                                        <span class="text-cyan-600 uppercase font-light text-xs px-3 py-1 rounded-lg bg-cyan-50">
                                                            {{ $event->start_date->isoFormat('DD MMMM YYYY') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="event-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="event-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($lodgings) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                penginapan
                            </h1>
                            <a 
                                href="{{ route('guest.lodging.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="lodging" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($lodgings as $lodging)
                                    <div class="swiper-slide">
                                        <a 
                                            href="{{ route('guest.lodging.details', $lodging) }}"
                                            class="group"
                                        >
                                            <div class="relative w-full">
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
                                                                <div class="flex items-center space-x-1 text-cyan-600">
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
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="lodging-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="lodging-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($culinaries) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                kuliner
                            </h1>
                            <a 
                                href="{{ route('guest.culinary.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="culinary" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($culinaries as $culinary)
                                    <div class="swiper-slide">
                                        <a 
                                            href="{{ route('guest.culinary.details', $culinary) }}"
                                            class="group"
                                        >
                                            <div class="relative w-full h-80 bg-white rounded-xl overflow-hidden shadow-xl">
                                                <div class="p-3">
                                                    <div class="relative w-full h-40 overflow-hidden rounded-lg">
                                                        <img 
                                                            src="{{ asset('storage/images/souvenirs/' . $culinary->main_image) }}" 
                                                            alt="default" 
                                                            class="relative w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                                        >
                                                        <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                        <div class="absolute bottom-0 left-0 pl-3 pb-2">
                                                            <p class="flex items-center justify-end mb-2 space-x-1 text-white px-2 py-1 rounded-lg bg-white/30">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    @if ($culinary->type == 'Kuliner')
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M3 19h18"></path>
                                                                        <path d="M3 11h18a8 8 0 0 1 -8 8h-2a8 8 0 0 1 -8 -8z"></path>
                                                                        <path d="M9 8v-3"></path>
                                                                        <path d="M12 5v3"></path>
                                                                        <path d="M15 5v3"></path>
                                                                    @else
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                                                                    @endif
                                                                </svg>
                                                                <span class="capitalize tracking-wider text-xs">
                                                                    {{ $culinary->type }}
                                                                </span>
                                                            </p>    
                                                        </div>
                                                    </div>
                                                    <div class="relative py-3">
                                                        <h6 class="text-lg text-black font-light leading-6">
                                                            {{ Str::limit($culinary->title, 60, '...') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="absolute bottom-3 right-0 px-3">
                                                    <div class="text-cyan-600 bg-cyan-50 px-3 py-1 rounded-lg flex items-center space-x-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-f h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                                                            <circle cx="9" cy="9" r="2"></circle>
                                                        </svg>
                                                        <span class="uppercase font-light text-sm">
                                                            {{ 'rp ' . number_format($culinary->price_starting_from, 0, '.', ',') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="culinary-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="culinary-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($souvenirs) > 3)
            <div class="w-full relative overflow-hidden">
                <div class="max-w-screen-lg mx-auto px-4 md:px-8 lg:px-0">
                    <div>
                        <div class="flex items-center justify-between">
                            <h1 class="capitalize text-2xl font-semibold">
                                suvenir
                            </h1>
                            <a 
                                href="{{ route('guest.souvenir.index') }}" 
                                class="capitalize hover:underline"
                            >
                                lihat semua
                            </a>
                        </div>
                        <div 
                            id="souvenir" 
                            class="swiper-container bg-transparent py-6 w-72 md:w-full"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($souvenirs as $souvenir)
                                    <div class="swiper-slide">
                                        <a 
                                            href="{{ route('guest.souvenir.details', $souvenir) }}"
                                            class="group"
                                        >
                                            <div class="relative w-full h-80 bg-white rounded-xl overflow-hidden shadow-xl">
                                                <div class="p-3">
                                                    <div class="relative w-full h-40 overflow-hidden rounded-lg">
                                                        <img 
                                                            src="{{ asset('storage/images/souvenirs/' . $souvenir->main_image) }}" 
                                                            alt="default" 
                                                            class="relative w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                                        >
                                                        <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                        <div class="absolute bottom-0 left-0 pl-3 pb-2">
                                                            <p class="flex items-center justify-end mb-2 space-x-1 text-white px-2 py-1 rounded-lg bg-white/30">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    @if ($souvenir->type == 'Kuliner')
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M3 19h18"></path>
                                                                        <path d="M3 11h18a8 8 0 0 1 -8 8h-2a8 8 0 0 1 -8 -8z"></path>
                                                                        <path d="M9 8v-3"></path>
                                                                        <path d="M12 5v3"></path>
                                                                        <path d="M15 5v3"></path>
                                                                    @else
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                                                                    @endif
                                                                </svg>
                                                                <span class="capitalize tracking-wider text-xs">
                                                                    {{ $souvenir->type }}
                                                                </span>
                                                            </p>    
                                                        </div>
                                                    </div>
                                                    <div class="relative py-3">
                                                        <h6 class="text-lg text-black font-light leading-6">
                                                            {{ Str::limit($souvenir->title, 60, '...') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="absolute bottom-3 right-0 px-3">
                                                    <div class="text-cyan-600 bg-cyan-50 px-3 py-1 rounded-lg flex items-center space-x-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-f h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                                                            <circle cx="9" cy="9" r="2"></circle>
                                                        </svg>
                                                        <span class="uppercase font-light text-sm">
                                                            {{ 'rp ' . number_format($souvenir->price_starting_from, 0, '.', ',') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-end">
                            <div class="souvenir-button-next">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                            <div class="souvenir-button-prev">
                                <div class="w-10 h-10 rounded-full bg-black text-white hover:bg-opacity-75 flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                     </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('script')
    <script>
        const naturalCharm = document.querySelector('#natural-charm');
        const naturalCharmSwiper =  new Swiper(naturalCharm, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.natural-charm-button-next',
                prevEl: '.natural-charm-button-prev',
            },
        })
        
        const touristAttraction = document.querySelector('#tourist-attraction');
        const touristAttractionSwiper =  new Swiper(touristAttraction, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.tourist-attraction-button-next',
                prevEl: '.tourist-attraction-button-prev',
            },
        })

        const travel = document.querySelector('#travel');
        const travelSwiper =  new Swiper(travel, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.travel-button-next',
                prevEl: '.travel-button-prev',
            },
        })

        const event = document.querySelector('#event');
        const eventSwiper =  new Swiper(event, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.event-button-next',
                prevEl: '.event-button-prev',
            },
        })
        
        const lodging = document.querySelector('#lodging');
        const lodgingSwiper =  new Swiper(lodging, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.lodging-button-next',
                prevEl: '.lodging-button-prev',
            },
        })

        const culinary = document.querySelector('#culinary');
        const culinarySwiper =  new Swiper(culinary, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.culinary-button-next',
                prevEl: '.culinary-button-prev',
            },
        })
        
        const souvenir = document.querySelector('#souvenir');
        const souvenirSwiper =  new Swiper(souvenir, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                }
            },
            navigation: {
                nextEl: '.souvenir-button-next',
                prevEl: '.souvenir-button-prev',
            },
        })
        
    </script>
@endpush
