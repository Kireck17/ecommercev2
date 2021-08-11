<div class="h-full">
    <div class="h-full hidden sm:flex ">
        <div class="h-full w-full bg-white p-3 shadow-lg">
            <div class="px-3 flex justify-center items-center ">
                <a href="{{ route('admin.dashboard') }}">
                    <img class="h-16 w-auto" src="{{ asset('storage/logos/originalsaxcar.png') }}" alt="">
                </a>
            </div>
            <ul class="space-y-2 text-sm mt-5">
                <x-nav-links.admin href="{{ route('admin.dashboard') }}"
                :active="request()->routeIs('admin.dashboard')">
                    <span class="text-gray-600">
                        <i class="fas fa-laptop-house fa-lg"></i>
                    </span>
                    <span>
                        Inicio
                    </span>
                </x-nav-links.admin>
                {{-- Administrador de usuarios --}}
                <li @click.away="open = false" class="flex flex-col w-full" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full p-2 space-x-3 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>
                        <i class="fas fa-users-cog text-gray-600 fa-lg" aria-hidden="true"></i>
                            Administrador
                        </span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                    <ul x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" class="w-full py-2 pl-4 pr-4">
                            @can('Crear Usuarios')
                                <x-nav-links.admindropdowns href="{{ route('admin.users.create') }}"
                                :active="request()->routeIs('admin.users.create')">
                                    Agregar
                                </x-nav-links.admindropdowns>
                            @endcan

                            <x-nav-links.admindropdowns href="{{ route('admin.users.show') }}"
                            :active="request()->routeIs('admin.users.show')">
                                Mostrar
                            </x-nav-links.admindropdowns>
                    </ul>

                </li>
                @can('Agregar Inventario')
                    <x-nav-links.admin href="{{ route('admin.ecommerce.create') }}"
                    :active="request()->routeIs('admin.ecommerce.create')">
                        <span class="text-gray-600">
                            <i class="fas fa-plus fa-lg"></i>
                        </span>
                        <span>
                            Crear
                        </span>
                    </x-nav-links.admin>
                @endcan
                @can('Ver Inventario')
                    <li @click.away="open = false" class="flex flex-col w-full" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex flex-row items-center w-full p-2 space-x-3 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>
                                <i class="fa fa-eye mr-2 fa-lg text-gray-600" aria-hidden="true"></i>
                                Mostrar
                            </span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </button>
                        <ul x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95" class="w-full py-2 pl-4 pr-4">

                                <x-nav-links.admindropdowns href="{{ route('admin.ecommerce.trademarks.show') }}"
                                :active="request()->routeIs('admin.ecommerce.trademarks.show')">
                                    Marcas
                                </x-nav-links.admindropdowns>


                                <x-nav-links.admindropdowns href="{{ route('admin.ecommerce.categories.show') }}"
                                :active="request()->routeIs('admin.ecommerce.categories.show')">
                                    Categorias
                                </x-nav-links.admindropdowns>


                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.subcategories.show')}}"
                                :active="request()->routeIs('admin.ecommerce.subcategories.show')">
                                    Subcategorias
                                </x-nav-links.admindropdowns>


                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.origins.show')}}"
                                :active="request()->routeIs('admin.ecommerce.origins.show')">
                                    Paises
                                </x-nav-links.admindropdowns>


                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.providers.show')}}"
                                :active="request()->routeIs('admin.ecommerce.providers.show')">
                                    Proveedores
                                </x-nav-links.admindropdowns>


                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.warehouses.show')}}"
                                :active="request()->routeIs('admin.ecommerce.warehouses.show')">
                                    Almacenes
                                </x-nav-links.admindropdowns>
                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.products.show')}}"
                                :active="request()->routeIs('admin.ecommerce.products.show')"
                                >
                                    Productos
                                </x-nav-links.admindropdowns>
                                <x-nav-links.admindropdowns href="{{route('admin.ecommerce.stocks.show')}}"
                                :active="request()->routeIs('admin.ecommerce.stocks.show')">
                                    Existencias
                                </x-nav-links.admindropdowns>
                        </ul>
                    </li>
                @endcan
                {{--<li>
                    <a href="#"
                        class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                        <span class="text-gray-600">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </span>
                        <span>Notificaciones</span>
                    </a>
                </li>--}}
            </ul>
        </div>
    </div>
</div>

