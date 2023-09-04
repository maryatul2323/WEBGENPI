<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <p class="inline-block mb-2 px-2 py-1 rounded-md bg-black bg-opacity-5 text-black">
                    {{ $touristAttraction->travelObjectCategory->category }}
                </p>
                <h6 class="text-4xl text-black font-semibold leading-tight mb-5">
                    {{ $touristAttraction->title }}
                </h6>
                <div class="flex items-start space-x-2 text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="11" r="3"></circle>
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                    </svg>
                    <span class="capitalize text-base">
                        {{ $touristAttraction->location }}
                    </span>
                </div>
                <p class="whitespace-pre-line text-black">
                    {{ $touristAttraction->description }}
                </p>
                <div class="mt-14 space-y-14">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            galeri
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($touristAttraction->galleries as $gallery)
                                        <div class="swiper-slide w-full h-80 md:h-96 lg:h-[500px] rounded-2xl overflow-hidden">
                                            <img 
                                                src="{{ asset('storage/images/galleries/travel-objects/' . $gallery->filename) }}" 
                                                alt="{{ $touristAttraction->title . ' ' . $loop->iteration }}"
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