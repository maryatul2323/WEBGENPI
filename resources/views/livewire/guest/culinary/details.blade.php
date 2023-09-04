<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <h6 class="text-4xl text-black font-semibold leading-tight mb-5">
                    {{ $culinary->title }}
                </h6>
                <div class="space-y-2">
                    <div class="flex items-start space-x-1 lg:space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 lg:w-5 lg:h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        <span class="capitalize text-base">
                            {{ $culinary->type }}
                        </span>
                    </div>
                    <div class="flex items-start space-x-1 lg:space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 lg:w-5 lg:h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                            <circle cx="9" cy="9" r="2"></circle>
                        </svg>
                        <span class="capitalize text-base">
                            {{ 'mulai dari rp ' . number_format($culinary->price_starting_from, 0, '.', ',') }}
                        </span>
                    </div>
                </div>
                <p class="whitespace-pre-line text-black">
                    {{ $culinary->description }}
                </p>
                <div class="mt-14 space-y-14">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            galeri
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($culinary->galleries as $gallery)
                                        <div class="swiper-slide w-full h-80 md:h-96 lg:h-[500px] rounded-2xl overflow-hidden">
                                            <img 
                                                src="{{ asset('storage/images/galleries/souvenirs/' . $gallery->filename) }}" 
                                                alt="{{ $culinary->title . ' ' . $loop->iteration }}"
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($culinary->supplyOutlets) > 0)
                        <div>

                            <div class="flex items-center justify-between">
                                <h1 class="text-xl font-bold text-black capitalize">
                                    gerai
                                </h1>
                            </div>
                            <div class="mt-8 space-y-8">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    @foreach ($culinary->supplyOutlets->load('shop') as $supplyOutlet)
                                        <div class="col-span-1">
                                            <a href="{{ route('guest.shop.details', $supplyOutlet->shop) }}" class="group">
                                                <div class="w-full h-20 relative">
                                                    <div class="relative flex justify-center items-center space-x-4 w-full h-full">
                                                        <div class="w-20 h-full rounded-lg overflow-hidden flex-shrink-0">
                                                            <img 
                                                                src="{{ asset('storage/images/shops/' . $supplyOutlet->shop->main_image) }}" 
                                                                alt="{{ $supplyOutlet->shop->name }}"
                                                                class="w-full h-full object-cover transform group-hover:scale-105 transition-all duration-150"
                                                            >
                                                        </div>
                                                        <div class="w-full">
                                                            <h3 class="text-base group-hover:text-lime-600">
                                                                {{ Str::limit($supplyOutlet->shop->name, 40, '...') }}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
        const wrapper = document.querySelector('.swiper-container');
        const swiper =  new Swiper(wrapper, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 10,
        })
        
    </script>
@endpush