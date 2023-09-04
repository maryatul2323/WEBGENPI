<div>
    <div class="w-full md:max-w-lg lg:max-w-screen-sm mx-auto mt-60 px-4 md:px-0 pb-24">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="p-8 md:p-10 overflow-hidden">
                <h6 class="text-4xl text-black font-semibold leading-tight">
                    {{ $travel->title }}
                </h6>
                <div class="space-y-2 mt-5">
                    <div class="flex items-start space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                            <circle cx="9" cy="9" r="2"></circle>
                        </svg>
                        <span class="capitalize text-base">
                            {{ 'mulai dari rp ' . number_format($travel->price_starting_from, 0, '.', ',') }}
                        </span>
                    </div>
                    <div class="flex items-start space-x-3 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <polyline points="12 7 12 12 15 15"></polyline>
                        </svg>
                        <span class="capitalize text-base">
                            {{ 'layanan ' . $travel->service_duration }}
                        </span>
                    </div>
                </div>
                <p class="whitespace-pre-line text-black">
                    {{ $travel->description }}
                </p>
                <div class="mt-14 space-y-14">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            destinasi
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($travel->destinations->load('travelObject') as $destination)
                                        @if ($destination->travelObject->travelObjectCategory->category == 'Pesona Alam')
                                            <a href="{{ route('guest.naturalCharm.details', $destination->travelObject) }}" class="swiper-slide">
                                                <div class="relative h-96 md:h-72 lg:h-96 rounded-2xl overflow-hidden group">
                                                    <img 
                                                        src="{{ asset('storage/images/travel-objects/' . $destination->travelObject->main_image) }}" 
                                                        alt="{{ $destination->travelObject->title }}"
                                                        class="relative w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                                    >
                                                    <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                    <div class="absolute w-full p-5 bottom-0 space-y-4">
                                                        <h6 class="text-lg text-white font-light leading-6">
                                                            {{ $destination->travelObject->title }}
                                                        </h6>
                                                        <div class="flex items-center space-x-2 text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <circle cx="12" cy="11" r="3"></circle>
                                                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                                            </svg>
                                                            <span class="capitalize text-xs truncate">
                                                                {{ $destination->travelObject->location }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ route('guest.touristAttraction.details', $destination->travelObject) }}" class="swiper-slide">
                                                <div class="relative h-96 md:h-72 lg:h-96 rounded-2xl overflow-hidden group">
                                                    <img 
                                                        src="{{ asset('storage/images/travel-objects/' . $destination->travelObject->main_image) }}" 
                                                        alt="{{ $destination->travelObject->title }}"
                                                        class="relative w-full h-full object-cover group-hover:transform group-hover:scale-105 transition-all duration-150"
                                                    >
                                                    <div class="absolute w-full h-full inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/30"></div>
                                                    <div class="absolute w-full p-5 bottom-0 space-y-4">
                                                        <h6 class="text-lg text-white font-light leading-6">
                                                            {{ $destination->travelObject->title }}
                                                        </h6>
                                                        <div class="flex items-center space-x-2 text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <circle cx="12" cy="11" r="3"></circle>
                                                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                                            </svg>
                                                            <span class="capitalize text-xs truncate">
                                                                {{ $destination->travelObject->location }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            hal yang harus diketahui
                        </h1>
                        <ul class="mt-5 space-y-2">
                           @foreach ($travel->notes as $note)
                               <li class="flex space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <line x1="15" y1="16" x2="19" y2="12"></line>
                                        <line x1="15" y1="8" x2="19" y2="12"></line>
                                    </svg>
                                   <span>
                                       {{ $note->value }}
                                   </span>
                               </li>
                           @endforeach 
                        </ul>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            fasilitas yang didapatkan
                        </h1>
                        <ul class="mt-5 space-y-2">
                           @foreach ($travel->facilities as $facility)
                               <li class="flex space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="4"></circle>
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
                            ketentuan dan kebijakan
                        </h1>
                        <ul class="mt-5 space-y-2 divide-y divide-true-gray-200">
                           @foreach ($travel->policies as $policy)
                               <li class="text-black py-4">
                                    <h6 class="font-semibold mb-1">
                                        {{ $policy->title }}
                                    </h6>
                                    <p>
                                        {{ $policy->description }}
                                    </p>
                               </li>
                           @endforeach 
                        </ul>
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
        slidesPerView: 2,
        spaceBetween: 10,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 10,
            }
        }
    })
    
</script>
@endpush