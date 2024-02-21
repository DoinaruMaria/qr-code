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
</head>

<body>

    <x-app-layout>
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
                        class="font-semibold p-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}"
                        class="font-semibold p-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Conectați-vă</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold p-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Înregistrați-vă</a>
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
        <x-slot name="header" style="calc(100svh - 96px)">
            <div class="flex flex-col">
                <div class="w-full h-[30svh] md:h-[50svh] lg:h-[80svh] bg-center bg-no-repeat bg-cover"
                    style="background-image: url({{ asset($event->cover) }})">
                </div>
                <div id="countdown" class="flex  items-center justify-center text-white text-center  text-[4rem] "
                    style="height: calc(20svh - 96px); background: linear-gradient(45deg,{{$secondary_color}}, {{$primary_color}})">
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
        <section class="max-w-[80rem] mx-auto py-8 lg:py-[6rem]">
            <div class="flex justify-center align-center w-full bg-center bg-no-repeat bg-contain h-[14rem]"
                style="background-image: url({{ asset($event->logo) }})">
            </div>
            <div class="text-center font-bold ">
                @isset($event->excerpt)
                <h1 class="text-white text-[1.75rem] px-2 lg:px-4">
                    {{$event->excerpt}}
                </h1>
                @endisset
            <div class="flex max-w-[60rem] dark:text-white mx-auto text-sm">
            @isset($event->description)
            <div class="p-4 py-8 flex-2">
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
                <a href="{{ url('/generate-ticket',$event->id) }}"><button
                        class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded"
                        style="background-color: {{ $primary_color }};">ia bilet</button></a>
            </div>
        </section>

    </x-app-layout>

</body>

</html>