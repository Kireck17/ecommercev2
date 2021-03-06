<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased ">
        <div class="flex flex-col sm:flex-row min-h-screen h-full">
            <div class="sm:w-3/12 h-auto bg-white">
                @include('layouts.navigation-admin')
            </div>
            <div class="sm:w-9/12 bg-gray-200 py-3  sm:py-0 ">
                <div class="hidden bg-white py-2 h-16 sm:flex flex-row-reverse items-center px-6">
                        <x-Drop.dropdown>
                          <x-slot name="trigger">
                            <h4 class="cursor-pointer px-2 font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide hover:bg-gray-200 rounded-md">
                             <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                             Opciones
                            </h4>
                          </x-slot>
                          <x-slot name="content">
                                <div class="flex items-center space-x-4 p-2">
                                    <img class="h-12 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="James Bhatta">
                                    <div>
                                        <h4 class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">
                                         {{ Auth::user()->name }}
                                        </h4>
                                        <span class="text-sm tracking-wide flex items-center space-x-1">
                                            <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg><span class="text-gray-600">Verificado</span>
                                        </span>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-nav-links.responsive href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    {{ __('Log Out') }}
                                </x-nav-links.responsive>
                                </form>
                            
                          </x-slot>   
                        </x-Drop.dropdown>
                        <livewire:notifications.show/>
                </div>
               
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                <!-- Page Content-->
                <main>
                    <x-containers.main>
                        <x-banners.toast />
                        {{ $slot }}
                    </x-containers.main>
                </main>
            </div>
        </div>
        @livewireScripts
    </body>
</html>