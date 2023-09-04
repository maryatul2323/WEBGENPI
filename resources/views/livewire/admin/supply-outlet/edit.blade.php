<div>
    <div class="w-full lg:max-w-screen-md mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-10 lg:p-12">
            <form
                wire:submit.prevent="submit"
                class="space-y-16"
            >
                <div>
                    <h1 class="text-black font-bold text-xl capitalize">
                        data gerai
                    </h1>
                    <div class="mt-8 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="shop-name"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    nama toko
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan nama toko baru dengan singkat dan jelas
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <input 
                                    type="text" 
                                    wire:model="shopName"
                                    id="shop-name"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                >
                                @error('shopName')
                                    <span class="block mt-2 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    for="shop-location"
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    lokasi
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tambahkan lokasi lengkap letak toko penyedia suvenir (nama jalan, kecamatan, kabupaten)
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <textarea 
                                    wire:model="shopLocation"
                                    id="shop-location"
                                    class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                ></textarea>
                                @error('shopLocation')
                                    <span class="block mt-0 text-xs text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-8">
                            <div class="col-span-1">
                                <label 
                                    class="block mb-1 text-black font-medium capitalize"
                                >
                                    tandai lokasi
                                </label>
                                <p class="text-sm text-true-gray-700">
                                    Tandai lokasi yang tepat mengenai keberadaan toko
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div 
                                    wire:ignore
                                    id="map"
                                    class="w-full h-80 border border-black/75 rounded-lg">
                                </div>
                                <div>
                                    <input 
                                        type="hidden" 
                                        wire:model="shopLat"
                                        class="w-full rounded-lg border-black/75 focus:outline-none focus:ring focus:ring-black/20 focus:border-black"
                                    >
                                    @error('shopLat')
                                        <span class="block mt-2 text-xs text-red-600">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
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
                                    Tambahkan gambar utama yang menarik untuk menggambarkan toko
                                </p>
                            </div>
                            <div class="col-span-1 pt-0 md:pt-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <div class="flex items-start space-x-2">
                                            <div class="relative w-full h-32 rounded-md overflow-hidden">
                                                @if ($shopMainImage)
                                                    @error('shopMainImage')
                                                        <span class="p-4 w-full h-full flex items-center justify-center bg-true-gray-100 border border-black/75 rounded-md">
                                                            <p class="text-true-gray-700 capitalize text-sm text-center">
                                                                unggah gambar utama
                                                            </p>
                                                        </span>
                                                    @else
                                                        <img 
                                                            src="{{ $shopMainImage->temporaryUrl() }}" 
                                                            class="w-full h-full object-cover"
                                                        >
                                                    @enderror
                                                @else
                                                    <img 
                                                        src="{{ asset('storage/images/shops/' . $supplyOutlet->shop->main_image) }}" 
                                                        class="w-full h-full object-cover"
                                                    >
                                                @endif
                                                <div
                                                    wire:loading
                                                    wire:target="shopMainImage"
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
                                                    wire:model="shopMainImage" 
                                                    id="hero-image"
                                                    class="hidden"
                                                >
                                            </div>
                                        </div>
                                        @error('shopMainImage')
                                            <span class="block mt-2 text-xs text-red-600">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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


@push('script')
    <script>
        document.addEventListener('livewire:load', function() {
            let markers = [];
            
            mapboxgl.accessToken = '{{ env('MAPBOX_TOKEN') }}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: [@this.shopLong, @this.shopLat],
                zoom: 11.15,
                style: 'mapbox://styles/mapbox/streets-v11'
            });

            map.addControl(new mapboxgl.NavigationControl())

            const marker = new mapboxgl.Marker()
                                        .setLngLat([@this.shopLong, @this.shopLat])
                                        .addTo(map);

            markers.push(marker);


            map.on('click', (e) => {

                @this.shopLat  = e.lngLat.lat;
                @this.shopLong = e.lngLat.lng;

                markers.forEach((item) => item.remove());
                markers = [];

                const marker = new mapboxgl.Marker()
                                            .setLngLat([e.lngLat.lng, e.lngLat.lat])
                                            .addTo(map);
                
                markers.push(marker);
            })
        });
    </script>
@endpush