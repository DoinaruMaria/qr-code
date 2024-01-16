<x-guest-layout>
  
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nume -->
        <div>
            <x-input-label for="first_name" :value="__('Nume')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

         <!-- Prenume -->
        <div  class="mt-4">
            <x-input-label for="last_name" :value="__('Prenume')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefon -->
        <div  class="mt-4">
            <x-input-label for="phone" :value="__('Telefon')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Tip -->
        <div  class="mt-4 align-middle  ">
            <x-input-label for="user_type" :value="__('Tip de utilizator')" />
            <div class="mt-1 flex flex-col" for="user_type">
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Elev">
                    <span class="pl-2 text-center text-gray-300 "> Elev </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Student">
                    <span class="pl-2 text-center text-gray-300"> Student </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Absolvent">
                    <span class="pl-2 text-center text-gray-300"> Absolvent </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Parinte">
                    <span class="pl-2 text-center text-gray-300"> Parinte </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Vizitator">
                    <span class="pl-2 text-center text-gray-300"> Vizitator </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="user_type"  value="Reprezentant companie">
                    <span class="pl-2 text-center text-gray-300"> Reprezentant companie </span>
                    </input>
                </div>
            </div>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />        </div>

        <!-- Judete-->
        <div  class="mt-4">
            <x-input-label for="county" :value="__('Judet')" />
            <select name="county" id="county" class="mt-1 text-sl bg-gray-900 text-gray-400 ">
                <option value="" class=""  >Selecteaza judetul</option>
                @foreach ($judete as $key => $node)
                    <option value="{{ $key }}" @selected(old('county') == $key)>{{ $node }}</option>
                @endforeach
            </select> 
            <x-input-error :messages="$errors->get('county')" class="mt-2" />
        </div>

        <!-- Parola -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parola')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirma Parola -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Parola')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ești deja înregristrat?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Înregistrează-te') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
