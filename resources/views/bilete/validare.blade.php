<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <title>Document</title> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    
</head>
<body>

    <x-app-layout>
        <section class="max-w-7xl mx-auto flex justify-center items-center h-[calc(100vh-97px)]">
            <div class="bg-white w-[30rem] h-auto  rounded-lg flex flex-col justify-between items-between">
                <div class="p-4 h-full flex flex-col justify-between">
                    <div class="flex justify-between mb-4">
                        <div class="flex flex-col justify-center items-left">
                            <h1 class="text-[1rem] text-gray-400 font-bold">
                                Participant
                            </h1>
                            <span class="text-[1.4rem]">
                                {{$isTicket->user->first_name}} {{$isTicket->user->last_name}}
                            </span>
                        </div>
                        <div class="flex flex-col justify-center items-right text-right">
                            <h1 class="text-[1rem] text-gray-400 font-bold">
                                Bilet #
                            </h1>
                            <span class="text-[1.4rem]">
                                {{$isTicket->id}}
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col justify-center items-left">
                            <h1 class="text-[1rem] text-gray-400 font-bold">
                                Eveniment
                            </h1>
                            <span class="text-[1.4rem]">
                                {{$isTicket->event->name}}
                            </span>
                        </div>
                        <div class="flex flex-col justify-center items-right text-right">
                            <h1 class="text-[1rem] text-gray-400 font-bold">
                                Editia
                            </h1>
                            <span class="text-[1.4rem]">
                                {{$isTicket->event->edition}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex justify-center items-center border-t-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[4rem] h-[4rem] text-green-500">
                      <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-green-500 text-bold text-[2rem]">Bilet Validat</h1>
                </div>
            </div>
        </section>
    </x-app-layout>
</body>
</html>