<nav x-data="{ open: false }" class="bg-white flex justify-between items-center border-b border-turquoise-dark h-20 py-2 px-6">
    <a href="/" class="h-full">
        <img class="h-full w-auto rounded-md shadow-md" src="{{asset('storage/logos/originalsaxcar.png')}}" alt="">
    </a>
    <div class="hidden sm:flex sm:justify-between sm:items-center sm:space-x-3">
        <x-nav-links.normal href="{{route('welcome')}}" :active="request()->routeIs('welcome')">
            {{__('Inicio')}}
        </x-nav-links.normal>
        <livewire:shop.nav-link-categories />
        <x-nav-links.normal href="{{route('tutorials.show')}}" :active="request()->routeIs('tutorials.show')" >
            {{__('Tutoriales')}}
        </x-nav-links.normal>
        <x-nav-links.normal href="/" :active="request()->routeIs('photo.edit')">
            {{__('Contactanos')}}
        </x-nav-links.normal>
        <x-nav-links.normal href="/ShoppingCart" >
           <i class="fa fa-shopping-cart"></i>
        </x-nav-links.normal>
    </div>
    @auth
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
    @endauth
    @guest
        <div class="hidden sm:flex sm:items-center sm:mr-6 sm:space-x-2">
            <x-nav-links.normal href="{{ route('login') }}" :active="request()->routeIs('login')">
                {{__('Iniciar sesion')}}
            </x-nav-links.normal>
            <x-nav-links.normal href="{{ route('register') }}" :active="request()->routeIs('register')">
                {{__('Registrarse')}}
            </x-nav-links.normal>
        </div>
    @endguest
</nav>