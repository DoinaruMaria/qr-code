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
    $google_start=gmdate('Ymd\THis\Z', strtotime($event->start_date));
    $google_end=gmdate('Ymd\THis\Z', strtotime($event->end_date));

    @endphp
    <script>
    // JavaScript countdown logic
    function countdown() {
        var countdownDate = new Date("{{$event->start_date}}").getTime();

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

        <x-slot name="header" style="calc(100svh - 96px)">
            <div class="flex flex-col">
                <div class="w-full h-[30svh] md:h-[50svh] lg:h-[80svh] bg-center bg-no-repeat bg-cover"
                    style="background-image: url({{ asset($event->cover) }})">
                </div>
                <div class="flex  items-center justify-center text-white text-center text-[2rem] lg:text-[4rem] "
                    style=" background-color: {{ $primary_color }};">
                    <div class="w-full flex flex-col justify-center text-center items-center" >
                        @if(Auth::check())
                            @if(Auth::user()->hasTicketForEvent($event->id))
                            <a href="{{ url('/generare-bilet', $event->slug) }}" class="w-full">
                                <div class="w-full  uppercase py-[1.4rem]  text-white text-5xl rounded font-extrabold"
                                    >Vezi biletul</div>
                            </a>
                            @else
                            <a href="{{ url('/generare-bilet', $event->slug) }}" class="w-full" >
                                <div class="w-full  uppercase py-[1.4rem]  text-white text-5xl rounded font-extrabold"
                                   >Ia bilet</div>
                            </a>
                            @endif
                        @endif
                            @guest

                                <a href="{{ url('/login') }}" class="w-full">
                                    <div class="w-full  uppercase py-[1.4rem]  text-white text-5xl rounded font-extrabold"
                                    >Ia bilet</div>
                                </a>

                            @endguest
                    </div>
                </div>
                <div id="countdown" class="flex  items-center justify-center text-white text-center text-[2rem] lg:text-[4rem] pb-[1.4rem]"
                    style="height: calc(23svh - 96px); background: linear-gradient(360deg,{{$secondary_color}}, {{$primary_color}})">
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
                
                @guest
                    <p class="text-white py-4 text-[20px] font-bold w-full text-center px-4 flex justify-center bg-[#111827]" >
                            Pentru a achiziționa bilet, trebuie să fii autentificat!
                    </p> 
                @endguest
            </div>
        </x-slot>
        <section class="max-w-[80rem] mx-auto py-10 px-10 lg:py-[3rem] lg:px-[6rem]">
       
            <div class="flex justify-center align-center w-full bg-center bg-no-repeat bg-contain h-[14rem]"
                style="background-image: url({{ asset($event->logo) }})">
            </div>
            <div class="text-center pt-4">
                @isset($event->excerpt)
                <h1 class="text-white text-[1.75rem] px-2 lg:px-4 font-bold leading-[1.2]">
                    {{$event->excerpt}}
                </h1>
                @endisset
                @if (!empty($event->website))
                <div class="flex justify-center pt-4 text-sm uppercase text-white">
                    <a href="{{ $event->website }}" target="_blank" class="flex justify-center">Vizitează site-ul
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor"
                            class="ml-2 w-[1.2rem] h-[1.2rem] broder-2 border rounded bg-white text-black">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
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
                <div class="flex justify-around mb-8 w-fit mx-auto font-bold">

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
                </a>
                @if(Auth::check())
                @if(Auth::user()->hasTicketForEvent($event->id))
                <a href="{{ url('/generare-bilet', $event->slug) }}">
                    <button class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded"
                        style="background-color: {{ $primary_color }};">Vezi biletul</button>
                </a>
                @else
                <a href="{{ url('/generare-bilet', $event->slug) }}">
                    <button class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded"
                        style="background-color: {{ $primary_color }};">Ia bilet</button>
                </a>
                @endif
                @endif
                @guest
                    <p class="text-white mb-4 text-[20px] font-bold " >
                        Pentru a achiziționa bilet, trebuie să fii autentificat!
                    </p>
                    <a href="{{ url('/login') }}">
                        <button class="px-[5rem] py-[1rem] uppercase text-white text-4 rounded font-bold"
                        style="background-color: {{ $primary_color }};">Ia bilet</button>
                    </a>
                @endguest
            </div>
        </section>
    </x-app-layout>
</body>
</html>