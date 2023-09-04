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
<body class="relative antialiased font-poppins bg-white">
    <div class="fixed z-10 hidden lg:block w-80 h-screen top-0 left-0 overflow-y-auto pb-16">
        <x-admin-menu />
    </div>
    <div class="relative ml-0 lg:ml-80 pb-40">
        <div class="absolute inset-0 w-full h-[600px] rounded-bl-[50px] rounded-br-[50px] overflow-hidden">
            <img 
                src="{{ asset('storage/images/heroes/' . $heroImage) }}" 
                alt="hero"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-tr {{ $heroGradient }}"></div>
        </div>
        <div class="relative">
            <div class="max-w-screen-2xl mx-auto px-4 lg:px-10">
                <div class="py-6 pb-4 lg:pt-10 lg:pb-5 flex items-center justify-between border-b border-white/30">
                    <div
                        class="block lg:hidden"
                        x-data="{ open: false }"
                        x-effect="open ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')"
                    >
                        <a 
                            href=""
                            class="text-white hover:text-opacity-60"
                            @click.prevent="open = true"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="4" y1="6" x2="20" y2="6"></line>
                                <line x1="4" y1="12" x2="20" y2="12"></line>
                                <line x1="4" y1="18" x2="16" y2="18"></line>
                            </svg>
                        </a>
                        <div 
                            :class="{ 'hidden': !open }"
                            class="hidden fixed w-full h-screen px-4 inset-0 bg-black/50 z-10"
                            @click.self="open = false"
                        >
                            <div class="w-80 h-full absolute left-0 top-0 bg-white overflow-y-auto pb-16">
                                <x-admin-menu />
                            </div>
                        </div>
                    </div>
                    <x-logo class="w-20 text-white" />
                    <div class="flex items-center space-x-3">
                        <img 
                            src="{{ asset('storage/images/users/' . auth()->user()->profile_picture) }}" 
                            alt="user"
                            class="relative w-9 h-9 lg:w-11 lg:h-11 rounded-full object-cover"
                        >
                        <div class="hidden lg:block text-white capitalize">
                            <h6 class="font-light text-sm">
                                {{ auth()->user()->name }}
                            </h6>
                            <p class="font-bold text-xs">
                                admin
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2 mt-6 whitespace-nowrap overflow-hidden overflow-x-auto pb-4">
                    <a href="{{ route('admin.dashboard.index') }}" class="text-white text-opacity-60 hover:text-opacity-100 -mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                        </svg>
                    </a>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/75" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="9 6 15 12 9 18"></polyline>
                            </svg>
                            <a href="{{ $breadcrumb['route'] }}" class="capitalize text-base {{ $loop->last ? 'text-white' : 'text-white text-opacity-60 hover:text-opacity-100' }}">
                                {{ $breadcrumb['label'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-8 px-4 lg:px-10">
                {{ $slot }}
            </div>
            <div class="from-yellow-600/75 to-yellow-800/75"></div>
            <div class="from-purple-600/75 to-purple-800/75"></div>
            <div class="from-blue-600/75 to-blue-800/75"></div>
            <div class="from-pink-600/75 to-pink-800/75"></div>
            <div class="from-green-600/75 to-green-800/75"></div>
            <div class="from-lime-600/75 to-lime-800/75"></div>
            <div class="from-cyan-600/75 to-cyan-800/75"></div>
            <div class="from-fuchsia-600/75 to-fuchsia-800/75"></div>
            <div class="from-pink-600 via-transparent to-transparent"></div>
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <livewire:scripts />
    @stack('script')
</body>
</html>