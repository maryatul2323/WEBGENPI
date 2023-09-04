<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <h6 class="text-4xl text-black font-semibold leading-tight mb-5">
                    {{ $shop->name }}
                </h6>
                <div class="mt-8 space-y-14">
                    <div>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3 text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="11" r="3"></circle>
                                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                </svg>
                                <span class="capitalize text-base">
                                    {{ $shop->location }}
                                </span>
                            </div>
                        </div>
                        <div 
                            wire:ignore
                            id="map"
                            class="w-full h-80 rounded-xl mt-8">
                        </div>
                    </div>
                    @if (count($shop->supplyOutlets) > 0)
                        <div>
                            <div class="flex items-center justify-between">
                                <h1 class="text-xl font-bold text-black capitalize">
                                    produk
                                </h1>
                            </div>
                            <div class="mt-8 space-y-8">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    @foreach ($shop->supplyOutlets->load('souvenir') as $supplyOutlet)
                                        <div class="col-span-1">
                                            @if ($supplyOutlet->souvenir->type == 'Kuliner')
                                                <a href="{{ route('guest.culinary.details', $supplyOutlet->souvenir) }}" class="group">
                                                    <div class="w-full h-20 relative">
                                                        <div class="relative flex justify-center items-center space-x-4 w-full h-full">
                                                            <div class="w-20 h-full rounded-lg overflow-hidden flex-shrink-0">
                                                                <img 
                                                                    src="{{ asset('storage/images/souvenirs/' . $supplyOutlet->souvenir->main_image) }}" 
                                                                    alt="{{ $supplyOutlet->souvenir->title }}"
                                                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                                                >
                                                            </div>
                                                            <div class="w-full">
                                                                <h3 class="text-base group-hover:text-lime-600">
                                                                    {{ Str::limit($supplyOutlet->souvenir->title, 40, '...') }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ route('guest.souvenir.details', $supplyOutlet->souvenir) }}" class="group">
                                                    <div class="w-full h-20 relative">
                                                        <div class="relative flex justify-center items-center space-x-4 w-full h-full">
                                                            <div class="w-20 h-full rounded-lg overflow-hidden flex-shrink-0">
                                                                <img 
                                                                    src="{{ asset('storage/images/souvenirs/' . $supplyOutlet->souvenir->main_image) }}" 
                                                                    alt="{{ $supplyOutlet->souvenir->title }}"
                                                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                                                >
                                                            </div>
                                                            <div class="w-full">
                                                                <h3 class="text-base group-hover:text-lime-600">
                                                                    {{ Str::limit($supplyOutlet->souvenir->title, 40, '...') }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
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