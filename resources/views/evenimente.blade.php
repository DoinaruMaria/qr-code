
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
            @isset($event->nume)
            {{$event->nume}}   
            @endisset
        </h2>    

        <h6 class="pt-2 font-leight text-sm text-gray-500 dark:text-gray-200">editia 
            @isset($event->editie)
            {{$event->editie}}   
            @endisset
        </h6>
            
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-40 text-gray-900 dark:text-gray-100 bg-red-400">
                </div>

                <form method="POST" action="{{ url('event_1') }}" class="p-6 text-gray-900 dark:text-gray-100-">

                    <x-input-label  class="pt-2"/><span class="font-semibold">Data: </span> 
                                    @isset($event->data)
                                    {{$event->data}}   
                                    @endisset

                    <x-input-label  class="pt-2"/><span class="font-semibold">Locatia: </span>
                                    @isset($event->locatie)
                                    {{$event->locatie}}   
                                    @endisset

                    <x-input-label  class="pt-2"/>@isset($event->descriere)
                                    {{$event->descriere}}   
                                    @endisset
                        
                    <x-input-label  class="pt-2 "/><a href="{{ url('/generateTicket',$event->id) }}"class="font-semibold text-blue-700">Ia bilet</a>

                </form>
            </div>
        </div>
    </div>
    
     
</x-app-layout>
    
</body>
</html>

       
           
        

            
     
