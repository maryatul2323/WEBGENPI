<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <h6 class="text-4xl text-black font-semibold leading-tight">
                    {{ $event->title }}
                </h6>
                <div class="space-y-2 mt-5">
                    <div class="flex items-start space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                            <line x1="16" y1="3" x2="16" y2="7"></line>
                            <line x1="8" y1="3" x2="8" y2="7"></line>
                            <line x1="4" y1="11" x2="20" y2="11"></line>
                            <rect x="8" y="15" width="2" height="2"></rect>
                        </svg>
                        <span class="capitalize text-base">
                            {{ $event->start_date->isoFormat('DD MMMM YYYY') }}
                            {{ ($event->start_date != $event->till_date) ? ' - ' . $event->till_date->isoFormat('DD MMMM YYYY') : '' }}
                        </span>
                    </div>
                    <div class="flex items-start space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="11" r="3"></circle>
                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                        </svg>
                        <span class="capitalize text-base">
                            {{ $event->location }}
                        </span>
                    </div>
                </div>
                <p class="whitespace-pre-line text-black">
                    {{ $event->description }}
                </p>
                <div class="mt-14 space-y-14">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            galeri
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($event->galleries as $gallery)
                                        <div class="swiper-slide w-full h-80 md:h-96 lg:h-[500px] rounded-2xl overflow-hidden">
                                            <img 
                                                src="{{ asset('storage/images/galleries/events/' . $gallery->filename) }}" 
                                                alt="{{ $event->title . ' ' . $loop->iteration }}"
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