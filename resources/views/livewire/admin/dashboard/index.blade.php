<div>
    <div class="max-w-xl lg:max-w-screen-md mx-auto">
        <div class="text-center md:text-left mb-16 space-y-6">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                hai, <br/>
                {{ auth()->user()->name }}
            </h1>
            <p class="text-white/80 leading-7 text-base lg:text-lg">
                Anda dapat melakukan pengelolaan data-data yang ada seperti menambahkan data yang ada baru, mengubah data-data yang sudah ada ataupun menghapus data yang ada yang sudah tidak relevan
            </p>
            <p class="text-white/80 leading-7 text-base lg:text-lg">
                Berikut statistik mengenai pengolahan data aplikasi GenPi Bengkalis
            </p>
        </div>
        <div class="space-y-6">
            <div class="w-full bg-white rounded-xl shadow-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-yellow-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M16.418 4.157a8 8 0 0 0 0 15.686"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $naturalCharm }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    pesona alam
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-purple-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 18l2 -13l2 -2l2 2l2 13"></path>
                                    <path d="M5 21v-3h14v3"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $touristAttraction }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    objek wisata
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h10l2 2l-2 2h-10a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1"></path>
                                    <path d="M13 13h-7l-2 2l2 2h7a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1"></path>
                                    <line x1="12" y1="22" x2="12" y2="17"></line>
                                    <line x1="12" y1="13" x2="12" y2="9"></line>
                                    <line x1="12" y1="5" x2="12" y2="3"></line>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $travel }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    travel
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-pink-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="6"></circle>
                                    <circle cx="5" cy="8" r="2"></circle>
                                    <circle cx="12" cy="4" r="2"></circle>
                                    <circle cx="19" cy="8" r="2"></circle>
                                    <circle cx="5" cy="16" r="2"></circle>
                                    <circle cx="19" cy="16" r="2"></circle>
                                    <path d="M8 22l4 -10l4 10"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $event }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    event
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-green-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                    <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11"></path>
                                    <circle cx="12" cy="9" r="2"></circle>
                                    <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $lodging }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    penginapan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 rounded-lg flex-shrink-0 flex items-center justify-center bg-lime-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-lime-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="19" r="2"></circle>
                                    <circle cx="17" cy="19" r="2"></circle>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h1 class="text-black text-xl font-semibold">
                                    {{ $souvenir }}
                                </h1>
                                <p class="capitalize font-light truncate">
                                    suvenir
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
