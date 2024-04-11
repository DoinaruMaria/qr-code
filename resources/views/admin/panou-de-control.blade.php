<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panou de control</title>
</head>

<body>
    <x-app-layout class="max-w-[80rem] mx-auto  ">
        <section class="h-full w-full p-4 md:p-[2.5rem]">
            <div class="w-full p-4 sm:p-8 dark:bg-gray-800 flex justify-start mb-6 shadow rounded-lg text-2xl">
                <p class="text-md text-white">
                    Bine ai venit pe panoul de control, {{ Auth::user()->first_name }}!
                </p>
            </div>
            <div id="successMessage" class="w-full p-4 sm:p-8 dark:bg-gray-800 hidden justify-start mb-6 shadow rounded-lg">
                <p class="text-md dark:text-green-400">
                    {{ __('Informațiile au fost actualizate cu succes!') }}
                </p>
            </div>            
            <div class="flex flex-col h-full max-w-7xl bg-gray-800 text-white rounded-xl">
                <div class="p-6 shadow-2xl text-2xl">
                    <h1>Detalii scanare</h1>
                </div>
                
                <div class="flex flex-col p-6">
                    <div class="py-4">
                        <h1 class="text-xl">Eveniment:</h1>
                        <select name="event" id="event" class="mt-2  bg-gray-900 text-gray-400 w-full">
                            <option value="default" class="py-4">Alege un eveniment</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" class="py-4">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-4" id="gateSelection" style="display: none;">
                        <h1 class="text-xl">Poarta de acces:</h1>
                        <select name="gate" id="gate" class="mt-2 bg-gray-900 text-gray-400 w-full">
                            <option value="default" class="py-4">Încărcare...</option>
                        </select>
                    </div>
                    <div id="buttonContainer" style="display: none;" class="w-full py-4">
                        <button id="submitButton" class="flex justify-center items-center p-4 w-full bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-[0.875rem] text-center text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2  focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Salveaza informațiile</button>
                    </div>
                </div>

            </div>

            <div id="scanTicketDiv" class="text-white mt-4 bg-gray-800 rounded-xl">
                <div id="scanTicketContent" class="p-6 flex flex-col shadow-2xl">
                    <h1 id="scanTicketText" class="flex items-center text-2xl">
                        Începe să scanezi pentru
                    </h1>
                </div>
                <div class="flex justify-between items-center p-6">
                    <div>
                        <div class="flex text-xl">
                            <h1 class="mr-2">Eveniment:</h1>
                            <h1 id="eventDetails"class="flex items-center justify-center">{{ $eventName }}</h1>
                        </div>
                        <div class="flex text-xl">
                            <h1 class="mr-2">Poarta acces:</h1>
                            <h1 id="gateDetails" class="flex items-center">{{ $gateName }}</h1>
                        </div>
                    </div>
                    <button id="scanTicketButton" class="w-[10rem] mt-4 md:mt-0 flex justify-center items-center p-4 w-full dark:bg-white border border-transparent rounded-md font-semibold text-[0.875rem] text-center text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Scanează</button>

                </div>
            </div>
        </section>
    </x-app-layout>

    <!-- Adaugă scriptul JavaScript aici -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var eventSelect = document.getElementById('event');
            var gateSelectionDiv = document.getElementById('gateSelection');
            var gateSelect = document.getElementById('gate');
            var buttonContainer = document.getElementById('buttonContainer');
            var submitButton = document.getElementById('submitButton');

            gateSelectionDiv.style.display = 'none';
            buttonContainer.style.display = 'none';

            eventSelect.addEventListener('change', function () {
                var eventId = this.value;

                if (eventId === '') {
                    gateSelectionDiv.style.display = 'none';
                    gateSelect.innerHTML = '';
                    buttonContainer.style.display = 'none';
                    return;
                }

                gateSelectionDiv.style.display = 'block';
                gateSelect.innerHTML = '';

                axios.get('/gates/' + eventId)
                    .then(function (response) {
                        var gates = response.data;

                        gates.forEach(function (gate) {
                            var option = document.createElement('option');
                            option.value = gate.id;
                            option.textContent = gate.name;
                            gateSelect.appendChild(option);
                        });

                        buttonContainer.style.display = 'block';
                    })
                    .catch(function (error) {
                        console.error('A apărut o eroare:', error);
                    });
            });

            submitButton.addEventListener('click', function () {
                var gateId = gateSelect.value;
                axios.post('/update-gate/' + gateId)
                    .then(function (response) {
                        var successMessage = document.getElementById('successMessage');
                        successMessage.style.display = 'block';
                        setTimeout(function () {
                            successMessage.style.display = 'none';
                            // Reîmprospătarea paginii după 3 secunde
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }, 2000);
                    })
                    .catch(function (error) {
                        console.error('A apărut o eroare:', error);
                    });
            });
            var scanTicketButton = document.getElementById('scanTicketButton');

            // Adăugați un ascultător de eveniment pentru când butonul este apăsat
            scanTicketButton.addEventListener('click', function () {
                // Verificați dacă dispozitivul suportă captura media
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    // Deschideți camera
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then(function (stream) {
                            // Dacă utilizatorul a acceptat accesul la cameră, puteți face ceva cu fluxul video aici
                            // De exemplu, puteți afișa un player video sau puteți procesa fluxul video pentru a scana ceva
                        })
                        .catch(function (error) {
                            console.error('A apărut o eroare la accesarea camerei:', error);
                        });
                } else {
                    console.error('Dispozitivul nu suportă captura media.');
                }
            });
        });
    </script>

</body>

</html>
