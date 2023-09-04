<div>
    <div class="w- md:max-w-lg lg:max-w-screen-sm mx-auto">
        <div class="bg-white rounded-3xl shadow-lg">
            <div class="relative w-full h-[450px] rounded-3xl overflow-hidden">
                <img 
                    src="{{ asset('storage/images/travels/' . $travel->main_image) }}" 
                    alt="{{ $travel->title }}"
                    class="relative w-full h-full object-cover"
                >
                <div class="absolute inset-0 w-full h-full bg-gradient-to-t from-black/75 via-transparent to-black/20"></div>
                <div class="absolute w-full p-8 md:p-10 pt-5 top-0">
                    <div class="flex items-center justify-end space-x-2">
                        <a href="{{ route('admin.travel.edit', $travel) }}" class="text-white hover:text-opacity-75">
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
                                            Yakin ingin hapus data "{{ $travel->title }}"?
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
                        {{ $travel->title }}
                    </h6>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                                <circle cx="9" cy="9" r="2"></circle>
                            </svg>
                            <span class="capitalize text-xs lg:text-sm truncate">
                                {{ 'mulai dari rp ' . number_format($travel->price_starting_from, 0, '.', ',') }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <polyline points="12 7 12 12 15 15"></polyline>
                            </svg>
                            <span class="capitalize text-xs lg:text-sm truncate">
                                {{ 'layanan ' . $travel->service_duration }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-8 md:p-10 pt-2 md:pt-4 overflow-hidden">
                <p class="whitespace-pre-line text-black">
                    {{ $travel->description }}
                </p>
                <div class="mt-14 space-y-10">
                    <div>
                        <h1 class="text-xl font-bold text-black capitalize">
                            destinasi
                        </h1>
                        <div class="mt-8 relative">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($travel->destinations->load('travelObject') as $destination)
                                        @if ($destination->travelObject->travelObjectCategory->category == 'Pesona Alam')
                                            <a href="{{ route('admin.naturalCharm.details', $destination->travelObject) }}" class="swiper-slide">
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
                                            <a href="{{ route('admin.touristAttraction.details', $destination->travelObject) }}" class="swiper-slide">
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
