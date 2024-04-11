<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="h-full ">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm block mt-1 w-full py-[13px] px-[15px] focus:outline-none" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 lg:mt-8  ">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="border-gray-300  dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm block mt-1 w-full py-[13px] px-[15px] focus:outline-none"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 flex justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.remember_me') }}</span>
            </label>
            @if (Route::has('password.request'))
            <a class=" text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md  dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Ți-ai uitat parola?') }}
            </a>
            @endif

        </div>

        <div class="flex justify-end mt-10 ">
            <div class="flex justify-center items-center">
                <a class="text-sm underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none "
                    href="{{ route('register') }}">
                    {{ __('Nu ai cont? Crează unul acum!') }}</a>
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>