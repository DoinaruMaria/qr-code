<x-guest-layout>
  
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nume -->
        <div>
            <x-input-label for="nume" :value="__('Nume')" />
            <x-text-input id="nume" class="block mt-1 w-full" type="text" name="nume" :value="old('nume')" required autofocus autocomplete="nume" />
            <x-input-error :messages="$errors->get('nume')" class="mt-2" />
        </div>

         <!-- Prenume -->
        <div  class="mt-4">
            <x-input-label for="prenume" :value="__('Prenume')" />
            <x-text-input id="prenume" class="block mt-1 w-full" type="text" name="prenume" :value="old('prenume')" required autofocus autocomplete="prenume" />
            <x-input-error :messages="$errors->get('prenume')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefon -->
        <div  class="mt-4">
            <x-input-label for="telefon" :value="__('Telefon')" />
            <x-text-input id="telefon" class="block mt-1 w-full" type="text" name="telefon" :value="old('telefon')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
        </div>

        <!-- Tip -->
        <div  class="mt-4 align-middle  ">
            <x-input-label for="tip" :value="__('Tip de utilizator')" />
            <div class="mt-1 flex flex-col" for="tip">
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Elev">
                    <span class="pl-2 text-center"> Elev </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Stundent">
                    <span class="pl-2 text-center"> Student </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Absolvent">
                    <span class="pl-2 text-center"> Absolvent </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Parinte">
                    <span class="pl-2 text-center"> Parinte </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Vizitator">
                    <span class="pl-2 text-center"> Vizitator </span>
                    </input>
                </div>
                <div class="align-middle flex flex-row w-full items-center"> 
                    <input type="checkbox" class="rounded-full" name="tip"  value="Reprezentant companie">
                    <span class="pl-2 text-center"> Reprezentant companie </span>
                    </input>
                </div>
            </div>
        </div>

        <!-- Judete-->
        <div  class="mt-4">
            <x-input-label for="judet" :value="__('Judet')" />
            <select name="judet" id="judet" class="mt-1 text-sl">
                <option value="">Selecteaza judetul</option>
                @foreach ($judete as $key => $node)
                    <option value="{{ $key }}" @selected(old('judet') == $key)>{{ $node }}</option>
                @endforeach
            </select> 
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
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
