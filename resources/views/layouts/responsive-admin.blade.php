<nav x-data="{ open: false }" class="bg-white border-b border-turquoise-dark">

        {{-- Navegación responsive --}}
        <div class="flex flex-col sm:hidden">
            <div class="flex justify-between items-center">
                <div class="px-8">
                    <a href="">
                        <img class="h-16 w-auto" src="{{asset('storage/logos/originalsaxcar.png')}}" alt="">
                    </a>
                </div>
                <!-- Hamburger -->
                <div class="mx-6 flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-turquoise-dark focus:outline-none focus:text-turquoise-light">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- Menú de hamburguesa --}}
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="flex flex-col justify-start space-y-0.5">
                <x-nav-links.responsive href="">
                    {{ __('Prueba 1') }}
                </x-nav-links.responsive>
                <x-nav-links.responsive href="">
                    {{ __('Prueba 2') }}
                </x-nav-links.responsive>
                <x-Drop.dropdown>
                    <x-slot name="trigger">
                        <h4 class="cursor-pointer px-2 font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">
                            <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                            Opciones
                        </h4>
                    </x-slot>
                    <x-slot name="content">

                        <div class="flex items-center space-x-4 p-2">
                            <img class="h-12 rounded-full" src="http://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f?s=260&d=mp" alt="James Bhatta">
                                <div>
                                    <h4 class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">Usuario</h4>
                                    <span class="text-sm tracking-wide flex items-center space-x-1">
                                     <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                     </svg>
                                     <span class="text-gray-600">Verificado</span>
                                    </span>
                                </div>
                        </div>
                        <a href="#" class="flex justify-center py-3 items-center  text-gray-700 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                            <span class="text-gray-600">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </span>
                            <span>Logout</span>
                        </a>

                    </x-slot>

                </x-Drop.dropdown>

                <x-Drop.dropdown>

                    <x-slot name="trigger">
                        <h4 class="cursor-pointer px-2 font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">
                          <i class="fa fa-bell mr-2" aria-hidden="true"></i>
                             Notificaciones
                        </h4>
                    </x-slot>

                    <x-slot name="content">
                        Notificaciones x2
                    </x-slot>

                </x-Drop.dropdown>
            </div>

        </div>
    </nav>