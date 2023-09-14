<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="nume" :value="__('Nume')" />
            <x-text-input id="nume" class="block mt-1 w-full" type="text" name="nume" :value="old('numeme')" required autofocus autocomplete="first-name" />
            <x-input-error :messages="$errors->get('nume')" class="mt-2" />
        </div>

         <!-- Last Name -->
        <div  class="mt-4">
            <x-input-label for="prenume" :value="__('Prenume')" />
            <x-text-input id="prenume" class="block mt-1 w-full" type="text" name="prenume" :value="old('prenume')" required autofocus autocomplete="last-name" />
            <x-input-error :messages="$errors->get('prenume')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div  class="mt-4">
            <x-input-label for="telefon" :value="__('Telefon')" />
            <x-text-input id="telefon" class="block mt-1 w-full" type="text" name="telefon" :value="old('telefon')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
        </div>

        <!-- Type -->
        <div  class="mt-4 align-middle  ">
            <x-input-label for="tip" :value="__('Tip')" />
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

        <!-- Country -->
        <div  class="mt-4">
            <x-input-label for="judet" :value="__('Judet')" />
            <select id="judet" class="mt-1 text-sl">
	            <option value="AB">Alba</option>
	            <option value="AG">Arges</option>
	            <option value="AR">Arad</option>
	            <option value="B" >Bucuresti</option>
                <option value="BC">Bacau</option>
	            <option value="BH">Bihor</option>
	            <option value="BN">Bistrita</option>
	            <option value="BR">Braila</option>
	            <option value="BT">Botosani</option>
	            <option value="BV">Brasov</option>
	            <option value="BZ">Buzau</option>
	            <option value="CJ">Cluj</option>
	            <option value="CL">Calarasi</option>
	            <option value="CS">Caras-Severin</option>
	            <option value="CT">Constanta</option>
	            <option value="CV">Covasna</option>
	            <option value="DB">Dambovita</option>
	            <option value="DJ">Dolj</option>
	            <option value="GJ">Gorj</option>
	            <option value="GL">Galati</option>
	            <option value="GR">Giurgiu</option>
	            <option value="HD">Hunedoara</option>
	            <option value="HG">Harghita</option>
	            <option value="IF">Ilfov</option>
	            <option value="IL">Ialomita</option>
	            <option value="IS">Iasi</option>
	            <option value="MH">Mehedinti</option>
	            <option value="MM">Maramures</option>
	            <option value="MS">Mures</option>
	            <option value="NT">Neamt</option>
	            <option value="OT">Olt</option>
	            <option value="PH">Prahova</option>
	            <option value="SB">Sibiu</option>
	            <option value="SJ">Salaj</option>
	            <option value="SM">Satu-Mare</option>
	            <option value="SV">Suceava</option>
	            <option value="TL">Tulcea</option>
	            <option value="TM">Timis</option>
	            <option value="TR">Teleorman</option>
	            <option value="VL">Valcea</option>
	            <option value="VN">Vrancea</option>
	            <option value="VS">Vaslui</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parola')" />

            <x-text-input id="parola" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
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
