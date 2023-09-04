<div>
    <div class="max-w-xl lg:max-w-screen-md mx-auto">
        <div class="text-center md:text-left mb-16 space-y-6">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white capitalize">
                pengaturan
            </h1>
            <p class="text-white/80 leading-7 text-base lg:text-lg">
                Anda dapat melakukan perubahan mengenai data-data akun anda seperti mengubah data profil maupun mengganti kata sandi baru
            </p>
        </div>
        <div class="space-y-6">
            <div class="w-full bg-white rounded-xl shadow-lg p-8">
                <div class="grid grid-cols-1 gap-10">
                    <div class="col-span-1 ">
                        <div class="flex space-x-5">
                            <div class="w-14 h-14 rounded-lg flex-shrink-0 flex items-center justify-center bg-fuchsia-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-fuchsia-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg>
                            </div>
                            <div class="flex space-x-5">
                                <div class="space-y-2">
                                    <h1 class="text-black text-xl font-semibold capitalize">
                                        akun
                                    </h1>
                                    <p>
                                        Ubah data mengenai data profil anda seperti nama lengkap, email ataupun foto profil
                                    </p>
                                </div>
                                <a 
                                    href="{{ route('admin.settings.account') }}"
                                    class="text-black hover:text-fuchsia-600"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex space-x-5">
                            <div class="w-14 h-14 rounded-lg flex-shrink-0 flex items-center justify-center bg-fuchsia-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-fuchsia-600" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                    <circle cx="12" cy="16" r="1"></circle>
                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                </svg>
                            </div>
                            <div class="flex space-x-5">
                                <div class="space-y-2">
                                    <h1 class="text-black text-xl font-semibold capitalize">
                                        kata sandi
                                    </h1>
                                    <p>
                                        Lakukan pembaharuan rutin kata sandi akun untuk meningkat keamanan akun anda
                                    </p>
                                </div>
                                <a 
                                    href="{{ route('admin.settings.password') }}"
                                    class="text-black hover:text-fuchsia-600"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
