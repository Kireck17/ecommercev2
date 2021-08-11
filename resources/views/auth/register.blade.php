<x-app-layout>
    <x-cards.auth>
        <x-slot name="logo">
            <a href="/" class="h-full">
                <img class="h-full w-auto rounded-md shadow-md" src="{{asset('storage/logos/originalsaxcar.png')}}" alt="">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{--<x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-forms.label for="name" :value="__('Name')" />

                <x-forms.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-forms.label for="email" :value="__('Email')" />

                <x-forms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-forms.label for="password" :value="__('Password')" />

                <x-forms.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-forms.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-buttons.turquoise class="ml-4">
                    {{ __('Register') }}
                </x-buttons.turquoise>
            </div>
        </form>
    </x-cards.auth>
</x-app-layout>
