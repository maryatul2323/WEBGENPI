<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <h6 class="text-4xl text-black font-semibold leading-tight mb-5">
                    {{ $lodging->title }}
                </h6>
                <div class="flex items-start space-x-1 text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                        <circle cx="9" cy="9" r="2"></circle>
                    </svg>
                    <span class="capitalize text-base">
                        {{ 'mulai dari rp ' . number_format($lodging->price_starting_from, 0, '.', ',') . '/malam' }}
                    </span>
                </div>
                <p class="whitespace-pre-line text-black">
                    {{ $lodging->description }}
                </p>
                <div class="mt-14 space-y-14">
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