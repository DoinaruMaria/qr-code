@include('layouts.navigation')
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Ați uitat parola? Nici o problemă. Doar anunțați-ne adresa dvs. de e-mail și vă vom trimite un link de resetare a parolei, care vă va permite să alegeți una nouă.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Link resetare parolă ') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
