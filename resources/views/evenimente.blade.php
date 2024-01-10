
     <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <title>Document</title> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script>
        // JavaScript countdown logic
        function countdown() {
            var countdownDate = new Date("{{$event->data}}").getTime();

            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countdownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("zileramase").innerHTML = days;
                document.getElementById("oreramase").innerHTML = hours;
                document.getElementById("minuteramase").innerHTML = minutes;
                document.getElementById("secunderamase").innerHTML = seconds;


                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "Evenimentul s-a sfârșit.";
                }
            }, 1000);
        }

        window.onload = function() {
            countdown();
        };
    </script>
</head>
<body>

    <x-app-layout>
    <x-slot name="header">
        <div class="xl:h-[calc(100vh-97px)] bg-gradient-to-r from-red-400 to-violet-900">
            <div class="relative">
                <img src="{{ asset('img/space.png') }}" class="h-[30rem] md:h-full max-h-[44rem] bg-center bg-no-repeat bg-cover w-full" > </img>

           <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center font-bold">
                <h1 class="text-white text-[3.75rem] uppercase">
                    @isset($event->nume)
                    {{$event->nume}}   
                    @endisset
                </h1>
                <h1 class="text-white text-[1.75rem] mb-[2.5rem]"> 
                    Excerpt for the event
                </h1>
                <div class="flex justify-around mb-8">
                    <h1 class="text-white pr-4"> 
                        @isset($event->data)
                        {{$event->data}}   
                        @endisset
                    </h1>
                    <h1 class="text-white border-x-4 px-4"> 
                        @isset($event->locatie)
                        {{$event->locatie}}   
                        @endisset
                    </h1>
                    <h1 class="text-white pl-4">Ediția 
                        @isset($event->editie)
                        {{$event->editie}}   
                        @endisset
                    </h1>
                </div>
                <a href="{{ url('/generateTicket',$event->id) }}"><button class="bg-violet-900 px-[5rem] py-[1rem] uppercase text-white text-4 rounded">ia bilet</button></a>
           </div>
        </div>
            <div id="countdown" class="flex justify-around text-white text-center text-[4rem] my-auto pb-4">
                <div class="flex flex-col">
                    <span id="zileramase" class="text-extrabold"></span>
                    <span class="text-[10px] mt-[-15px] tracking-[0.3em]">ZILE</span>
                </div>
                <span>:</span>
                <div class="flex flex-col">
                    <span id="oreramase" class="text-extrabold"></span>
                    <span class="text-[10px] mt-[-15px] tracking-[0.3em]">ORE</span>    
                </div>
                <span>:</span>
                <div class="flex flex-col">
                    <span id="minuteramase" class="text-extrabold"></span>
                    <span class="text-[10px] mt-[-15px] tracking-[0.3em]">MINUTE</span> 
                </div>
                <span>:</span>
                <div class="flex flex-col">
                    <span id="secunderamase" class="text-extrabold"></span>
                    <span class="text-[10px] mt-[-15px] tracking-[0.3em]">SECUNDE</span> 
                </div>
            </div>
        </div>

            
    </x-slot>

    <section class="max-w-[80rem] dark:text-white mx-auto flex flex-col lg:flex-row py-[6rem] justify-center">
        <div class="flex justify-center align-center mb-8 w-full basis-1/3">
            <img src="{{ asset('img/logo.png') }}"></img>
        </div>
        <div class="p-4 md:p-[2.5rem] basis-1/2">
            <h1 class="text-[2.25rem] border-b-2 mb-4">Despre eveniment</h1>
            <span>
                <x-input-label  class="pt-2"/>
                @isset($event->descriere)
                {{$event->descriere}}   
                @endisset
            </span>
        </div>
        </div>
    </section>
     
</x-app-layout>
    
</body>
</html>

       
           
        

            
     
