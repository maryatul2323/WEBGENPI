<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') . ' | ' . $titleBar }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logos/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />
</head>
<body class="relative antialiased font-poppins bg-true-gray-50 flex flex-col min-h-screen">
    <div class="flex-1 max-w-xl lg:max-w-screen-md w-full mx-auto flex items-center justify-center py-20 px-4 md:px-0">
        {{ $slot }}
    </div>

    <div class="relative bg-gradient-to-r from-cyan-800 to-cyan-900 overflow-hidden">
        <x-decoration class="absolute w-[1000px] -top-28 -right-36 md:-right-52 lg:-right-80 transform scale-[2] rotate-6" />
        <div class="relative max-w-screen-md mx-auto py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
                <div class="col-span-1 place-self-center">
                    <x-logo class="w-32 text-white" />
                </div>
                <div class="col-span-1">
                    <h1 class="text-white capitalize text-xl font-bold text-center">
                        tautan
                    </h1>
                    <div class="mt-6 space-y-2">
                        <a 
                            href="{{ route('guest.dashboard.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            <span class="capitalize">
                                beranda
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.naturalCharm.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M16.418 4.157a8 8 0 0 0 0 15.686"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                            <span class="capitalize">
                                pesona alam
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.touristAttraction.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 18l2 -13l2 -2l2 2l2 13"></path>
                                <path d="M5 21v-3h14v3"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                            </svg>
                            <span class="capitalize">
                                objek wisata
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.travel.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h10l2 2l-2 2h-10a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1"></path>
                                <path d="M13 13h-7l-2 2l2 2h7a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1"></path>
                                <line x1="12" y1="22" x2="12" y2="17"></line>
                                <line x1="12" y1="13" x2="12" y2="9"></line>
                                <line x1="12" y1="5" x2="12" y2="3"></line>
                            </svg>
                            <span class="capitalize">
                                travel
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.event.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="5" cy="8" r="2"></circle>
                                <circle cx="12" cy="4" r="2"></circle>
                                <circle cx="19" cy="8" r="2"></circle>
                                <circle cx="5" cy="16" r="2"></circle>
                                <circle cx="19" cy="16" r="2"></circle>
                                <path d="M8 22l4 -10l4 10"></path>
                            </svg>
                            <span class="capitalize">
                                event
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.lodging.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11"></path>
                                <circle cx="12" cy="9" r="2"></circle>
                                <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5"></path>
                            </svg>
                            <span class="capitalize">
                                penginapan
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.culinary.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 19h18"></path>
                                <path d="M3 11h18a8 8 0 0 1 -8 8h-2a8 8 0 0 1 -8 -8z"></path>
                                <path d="M9 8v-3"></path>
                                <path d="M12 5v3"></path>
                                <path d="M15 5v3"></path>
                            </svg>
                            <span class="capitalize">
                                kuliner
                            </span>
                        </a>
                        <a 
                            href="{{ route('guest.souvenir.index') }}"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                            </svg>
                            <span class="capitalize">
                                cendramata
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-span-1">
                    <h1 class="text-white capitalize text-xl font-bold text-center">
                        ikuti kami
                    </h1>
                    <div class="mt-6 space-y-2">
                        <a 
                            href="https://www.instagram.com/genpi.bengkalis/?hl=id"
                            target="_blank"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                            </svg>
                            <span class="capitalize">
                                instagram
                            </span>
                        </a>
                        <a 
                            href="https://web.facebook.com/genpi.bengkalis.9?_rdc=1&_rdr"
                            target="_blank"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                            </svg>
                            <span class="capitalize">
                                facebook
                            </span>
                        </a>
                        <a 
                            href="https://www.youtube.com/channel/UCE8kqZ1IKyTEFYqa082hMTA"
                            target="_blank"
                            class="flex items-center space-x-2 text-white hover:text-opacity-75"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="5" width="18" height="14" rx="4"></rect>
                                <path d="M10 9l5 3l-5 3z"></path>
                            </svg>
                            <span class="capitalize">
                                youtube
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative bg-white/10">
            <div class="max-w-screen-md mx-auto py-2">
                <p class="text-white flex items-center space-x-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M14.5 9a3.5 4 0 1 0 0 6"></path>
                    </svg>
                    <span>
                        {{ now()->year . ' - GenPi Bengkalis, all rights reserved' }}
                    </span>
                </p>
            </div>
        </div>
    </div>

    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script')
</body>
</html>