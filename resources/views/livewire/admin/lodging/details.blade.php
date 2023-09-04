<div>
    <div class="w- md:max-w-lg lg:max-w-screen-sm mx-auto">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="relative w-full h-[450px] rounded-3xl overflow-hidden">
                <img 
                    src="{{ asset('storage/images/lodgings/' . $lodging->main_image) }}" 
                    alt="{{ $lodging->title }}"
                    class="relative w-full h-full object-cover"
                >
                <div class="absolute inset-0 w-full h-full bg-gradient-to-t from-black/75 via-transparent to-black/20"></div>
                <div class="absolute w-full p-8 md:p-10 pt-5 top-0">
                    <div class="flex items-center justify-end space-x-2">
                        <a href="{{ route('admin.lodging.edit', $lodging) }}" class="text-white hover:text-opacity-75">
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
                                class="text-white hover:text-opacity-75"
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
                                                wire:click.prevent="delete"
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
                <div class="absolute w-full p-8 md:p-10 pb-5 bottom-0 space-y-4">
                    <h6 class="text-4xl text-white font-light leading-tight">
                        {{ $lodging->title }}
                    </h6>
                    <div class="flex items-center space-x-1 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                            <circle cx="9" cy="9" r="2"></circle>
                        </svg>
                        <span class="capitalize text-xs lg:text-sm truncate">
                            {{ 'mulai dari rp ' . number_format($lodging->price_starting_from, 0, '.', ',') . '/malam' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="p-8 md:p-10 pt-2 md:pt-4 overflow-hidden">
                <p class="whitespace-pre-line text-black">
                    {{ $lodging->description }}
                </p>
                <div class="mt-14 space-y-10">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            fasilitas yang didapatkan
                        </h1>
                        <ul class="mt-5 space-y-2">
                           @foreach ($lodging->facilities as $facility)
                               <li class="flex space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0 text-green-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 11 12 14 20 6"></polyline>
                                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                    </svg>
                                   <span>
                                       {{ $facility->value }}
                                   </span>
                               </li>
                           @endforeach 
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            galeri
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($lodging->galleries as $gallery)
                                        <div class="swiper-slide w-full h-80 md:h-96 lg:h-[500px] rounded-2xl overflow-hidden">
                                            <img 
                                                src="{{ asset('storage/images/galleries/lodgings/' . $gallery->filename) }}" 
                                                alt="{{ $lodging->title . ' ' . $loop->iteration }}"
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            lokasi
                        </h1>
                        <div 
                            wire:ignore
                            id="map"
                            class="w-full h-80 rounded-xl mt-8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        const wrapper = document.querySelector('.swiper-container');
        const swiper =  new Swiper(wrapper, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 10,
        })
        
        document.addEventListener('livewire:load', function() {
            mapboxgl.accessToken = '{{ env('MAPBOX_TOKEN') }}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: [@this.long, @this.lat],
                zoom: 11.15,
                style: 'mapbox://styles/mapbox/streets-v11'
            });

            map.addControl(new mapboxgl.NavigationControl())

            new mapboxgl.Marker()
                        .setLngLat([@this.long, @this.lat])
                        .addTo(map);
        });
    </script>
@endpush
