<div>
    <div class="px-10 py-8">
        <div class="space-y-2">
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="4"></circle>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="4"></circle>
                </svg>
            </div>
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="4"></circle>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="4"></circle>
                </svg>
            </div>
        </div>
    </div>
    <div class="space-y-5 mt-6">
        <a 
            href="{{ route('admin.dashboard.index') }}" 
            class="px-2 flex items-center group"
        >
        <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.dashboard.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                </svg>
                <span class="capitalize text-lg">beranda</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.naturalCharm.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.naturalCharm.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16.418 4.157a8 8 0 0 0 0 15.686"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                </svg>
                <span class="capitalize text-lg">pesona alam</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.touristAttraction.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.touristAttraction.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 18l2 -13l2 -2l2 2l2 13"></path>
                    <path d="M5 21v-3h14v3"></path>
                    <line x1="3" y1="21" x2="21" y2="21"></line>
                </svg>
                <span class="capitalize text-lg">objek wisata</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.travel.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.travel.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 5h10l2 2l-2 2h-10a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1"></path>
                    <path d="M13 13h-7l-2 2l2 2h7a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1"></path>
                    <line x1="12" y1="22" x2="12" y2="17"></line>
                    <line x1="12" y1="13" x2="12" y2="9"></line>
                    <line x1="12" y1="5" x2="12" y2="3"></line>
                </svg>
                <span class="capitalize text-lg">travel</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.event.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.event.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="5" cy="8" r="2"></circle>
                    <circle cx="12" cy="4" r="2"></circle>
                    <circle cx="19" cy="8" r="2"></circle>
                    <circle cx="5" cy="16" r="2"></circle>
                    <circle cx="19" cy="16" r="2"></circle>
                    <path d="M8 22l4 -10l4 10"></path>
                </svg>
                <span class="capitalize text-lg">event</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.lodging.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.lodging.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="3" y1="21" x2="21" y2="21"></line>
                    <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11"></path>
                    <circle cx="12" cy="9" r="2"></circle>
                    <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5"></path>
                </svg>
                <span class="capitalize text-lg">penginapan</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.souvenir.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.souvenir.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8 overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                </svg>
                <span class="capitalize text-lg truncate">suvenir</span>
            </div>
        </a>
        <a 
            href="{{ route('admin.settings.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('admin.settings.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8 overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <span class="capitalize text-lg truncate">pengaturan</span>
            </div>
        </a>
        <div
            x-data="{ open: false }"
            x-effect="open ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')"
        >
            <a 
                href="" 
                class="px-2 flex items-center group"
                @click.prevent="open = true"
            >
                <div class="w-1 h-7 rounded group-hover:bg-black bg-transparent"></div>
                <div class="flex items-center space-x-6 text-true-gray-800 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                    </svg>
                    <span class="capitalize text-lg">keluar</span>
                </div>
            </a>
            <div 
                :class="{ 'hidden': !open }"
                class="hidden fixed w-full h-screen px-4 inset-0 bg-black/50 z-10"
            >
                <div class="w-full h-full flex items-center justify-center">
                    <div class="w-[500px] px-8 pt-8 pb-12 md:px-10 md:pt-10 md:pb-14 bg-white rounded-lg whitespace-normal text-left">
                        <h1 class="text-true-gray-800 text-2xl">
                            Yakin ingin keluar?
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
                                href="{{ route('logout') }}"
                                class="px-4 py-2 rounded-lg bg-true-gray-800 hover:bg-true-gray-700 focus:outline-none focus:ring focus:ring-true-gray-700/30 text-white text-base capitalize"
                            >
                                keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>