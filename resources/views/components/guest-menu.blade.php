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
            href="{{ route('guest.dashboard.index') }}" 
            class="px-2 flex items-center group"
        >
        <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.dashboard.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.naturalCharm.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.naturalCharm.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.touristAttraction.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.touristAttraction.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.travel.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.travel.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.event.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.event.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.lodging.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.lodging.*') ? 'bg-black' : 'bg-transparent' }}"></div>
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
            href="{{ route('guest.culinary.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.culinary.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8 overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 19h18"></path>
                    <path d="M3 11h18a8 8 0 0 1 -8 8h-2a8 8 0 0 1 -8 -8z"></path>
                    <path d="M9 8v-3"></path>
                    <path d="M12 5v3"></path>
                    <path d="M15 5v3"></path>
                </svg>
                <span class="capitalize text-lg truncate">kuliner</span>
            </div>
        </a>
        <a 
            href="{{ route('guest.souvenir.index') }}" 
            class="px-2 flex items-center group"
        >
            <div class="w-1 h-7 rounded group-hover:bg-black {{ request()->routeIs('guest.souvenir.*') ? 'bg-black' : 'bg-transparent' }}"></div>
            <div class="flex items-center space-x-6 text-true-gray-800 px-8 overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                </svg>
                <span class="capitalize text-lg truncate">cendramata</span>
            </div>
        </a>
    </div>
</div>