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
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @isset($nume)
            {{$nume}}   
            @endisset
        </h2>    

        <h6 class="pt-2 font-leight text-sm text-gray-500 dark:text-gray-200">editia 
            @isset($editie)
            {{$editie}}   
            @endisset
        </h6>
            
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-40 text-gray-900 dark:text-gray-100 bg-red-400">
                    <!-- image -->
                </div>

                <form method="POST" action="{{ url('event_1') }}" class="p-6 text-gray-900 dark:text-gray-100-">
    
                    <x-input-label/>@isset($data)
                                    Data: {{$data}}   
                                    @endisset

                    <x-input-label  class="pt-2"/>Locatia: 
                                    @isset($locatia)
                                    {{$locatia}}   
                                    @endisset

                    <x-input-label  class="pt-2"/>@isset($descriere)
                                    {{$descriere}}   
                                    @endisset
                                    
                    <x-input-label  class="pt-2"/><a href="">Ia bilet</a>

                </form>
            </div>
        </div>
    </div>
    
     
</x-app-layout>
    
</body>
</html>