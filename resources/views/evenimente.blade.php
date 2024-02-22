<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title>Document</title> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @php
    $primary_color=@isset($event->primary_color) ? $event->primary_color : '#fff';
    $secondary_color=@isset($event->secondary_color) ? $event->secondary_color : '#fff';

    @endphp
    <script>
        // JavaScript countdown logic
        function countdown() {
            var countdownDate = new Date("{{$event->start_date}}").getTime();

            var x = setInterval(function () {
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

        window.onload = function () {
            countdown();
        };
    </script>
            @if(!Auth::check())
            <div
                class="relative  justify-center block sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 w-full bg-[#111827] h-20 flex justify-between text-right z-10">
    
                    <div class="flex justify-center w-16 h-16 m-2">
                        <img src="{{ asset('img/logo.svg') }}" alt="Logo" id="logoImage">
                    </div>
                    <div class="flex justify-end text-right">
                        @auth
                        <a href="{{ url('/acasa') }}"
                            class="font-semibold p-4  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                            class="font-semibold p-4  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Conectați-vă</a>
    
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold p-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Înregistrați-vă</a>
                        @endif
                        @endauth
                    </div>
    
                </div>
                <script>
                    document.getElementById('logoImage').addEventListener('click', function() {
                        window.location.href = "{{ url('/') }}";
                    });
                </script>
                @endif
            </div>
            @endif
</head>

<body>
    <x-app-layout>   
        <x-slot name="header" style="calc(100svh - 96px)">
            <div class="flex flex-col">
                <div class="w-full h-[30svh] md:h-[50svh] lg:h-[80svh] bg-center bg-no-repeat bg-cover"
                    style="background-image: url({{ asset($event->cover) }})">
                </div>
                <div id="countdown" class="flex  items-center justify-center text-white text-center  text-[4rem] "
                    style="height: calc(23svh - 96px); background: linear-gradient(45deg,{{$secondary_color}}, {{$primary_color}})">
                    <div class="flex flex-col me-8 md:me-12 lg:me-16 xl:me-20 2xl:me-32">
                        <span id="zileramase" class="text-3xl md:text-6xl font-bold"></span>
                        <span class="text-xs tracking-[0.2em]">ZILE</span>
                    </div>
                    <div class="flex flex-col me-8 md:me-12 lg:me-16 xl:me-20 2xl:me-32">
                        <span id="oreramase" class="text-3xl md:text-6xl font-bold"></span>
                        <span class="text-xs tracking-[0.2em]">ORE</span>
                    </div>
                    <div class="flex flex-col me-8 md:me-12 lg:me-16 xl:me-20 2xl:me-32">
                        <span id="minuteramase" class="text-3xl md:text-6xl font-bold"></span>
                        <span class="text-xs tracking-[0.2em]">MINUTE</span>
                    </div>
                    <div class="flex flex-col">
                        <span id="secunderamase" class="text-3xl md:text-6xl font-bold"></span>
                        <span class="text-xs tracking-[0.2em]">SECUNDE</span>
                    </div>
                </div>
            </div>
        </x-slot>
        <section class="max-w-[80rem] mx-auto py-10 px-10 lg:py-[6rem] lg:px-[6rem]">
            <div class="flex justify-center align-center w-full bg-center bg-no-repeat bg-contain h-[14rem]"
                style="background-image: url({{ asset($event->logo) }})">
            </div>
            <div class="text-center font-bold ">
                @isset($event->excerpt)
                <h1 class="text-white text-[1.75rem] px-2 lg:px-4">
                    {{$event->excerpt}}
                </h1>
                @endisset
                    @if (!empty($event->website))
                        <div class="flex justify-center pt-4 text-sm uppercase text-white">
                            <a href="{{ $event->website }}" target="_blank" class="flex justify-center">Viziteaza site-ul
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="ml-2 w-[1.2rem] h-[1.2rem] broder-2 border rounded bg-white text-black">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </a>
                        </div>
                    @endif
                <div class="flex max-w-[60rem] dark:text-white mx-auto text-sm">
            @isset($event->description)
            <div class="p-4 pb-8 flex-2">
                <span>
                    <x-input-label />
                    {{$event->description}}
                </span>
            </div>
            @endisset
            </div>
                <div class="flex justify-around mb-8 w-fit mx-auto">
                    @isset($event->start_date)
                    <h1 class="text-white pr-4">
                        {{ date('d-m-Y', strtotime($event->start_date)) }}
                    </h1>
                    @endisset
                    @isset($event->venue)
                    <h1 class="text-white border-x-4 px-4">
                        {{$event->venue}}
                    </h1>
                    @endisset
                    @isset($event->edition)
                    <h1 class="text-white pl-4">Ediția
                        {{$event->edition}}
                    </h1>
                    @endisset
                </div>
@if(Auth::check())
    @if(Auth::user()->hasTicketForEvent($event->id))
        <a href="{{ url('/generate-ticket', $event->id) }}">
            <button class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded"
                    style="background-color: {{ $primary_color }};">Vezi biletul</button>
        </a>
    @else
        <a href="{{ url('/generate-ticket', $event->id) }}">
            <button class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded"
                    style="background-color: {{ $primary_color }};">Ia bilet</button>
        </a>
    @endif
@endif
            </div>
        </section>

    </x-app-layout>

</body>

</html>