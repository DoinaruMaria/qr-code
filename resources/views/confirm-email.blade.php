<x-app-layout>

    <div class="min-h-[65vh] flex flex-col justify-center items-center my-8 lg:my-0">
        <div class="w-full sm:max-w-md px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <p class="flex justify-center text-center mb-8 text-white text-[2rem] font-bold">Îți mulțumim pentru
                înregistrare!
            </p>

            <p class="text-white text-center">
                Contul tău a fost creat cu succes. Pentru a finaliza procesul de înregistrare și a avea acces
                complet la
                toate
                funcționalitățile, este necesar să îți activezi contul.<br><br>

                Accesează linkul de activare trimis pe adresa de email.

            <form method="POST" action="{{ route('verification.send') }}" class="text-center mt-8 text-white">
                @csrf
                <p>Ați pierdut linkul de verificare? Nu vă faceți griji,</p>
                <button type="submit"
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">click
                    aici pentru a retrimite
                    linkul de
                    verificare prin
                    email.</button>
            </form>
            </p>

            <p class="mt-8 text-white font-bold flex justify-center">Bine ai venit în comunitatea noastră!
            </p>

        </div>
    </div>

</x-app-layout>