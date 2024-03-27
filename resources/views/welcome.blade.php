<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bilete UPB</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    <script>
    function formatDates(start, end, elementId) {
        var startDate = new Date(start);
        var endDate = new Date(end);
        var merge = '';

        // Check if both dates are in the same month and year
        if (startDate.getMonth() === endDate.getMonth()) {
            // Format as 'day_start - day_end // mm // yy'
            var formattedMonth = ("0" + (startDate.getMonth() + 1)).slice(-2); // Ensure two digits for month
            var formattedStartDay = ("0" + startDate.getDate()).slice(-2); // Ensure two digits for day
            var formattedEndDay = ("0" + endDate.getDate()).slice(-2); // Ensure two digits for day
            var formattedYear = startDate.getFullYear().toString(); // Last two digits of year
            merge = `${formattedStartDay}-${formattedEndDay}/${formattedMonth}/${formattedYear}`;
        } else {
            var formattedStartDay = ("0" + startDate.getDate()).slice(-2); // Ensure two digits for day
            var formattedStartMonth = ("0" + (startDate.getMonth() + 1)).slice(-2); // Ensure two digits for month
            var formattedEndDay = ("0" + endDate.getDate()).slice(-2); // Ensure two digits for day
            var formattedEndMonth = ("0" + (endDate.getMonth() + 1)).slice(-2); // Ensure two digits for month
            var formattedYear = startDate.getFullYear().toString(); // Last two digits of year
            merge =
                `${formattedStartDay}/${formattedStartMonth}/${formattedYear} - ${formattedEndDay}/${formattedEndMonth}/${formattedYear}`;

        }

        document.getElementById(elementId).innerHTML = merge;
    }
    </script>

</head>

<body class="antialiased dark">

    <x-app-layout>
        <div class="w-full px-6 pb-6 ">
            <div class="w-full flex justify-center relative ">
                <img src="{{ asset('img/curte-rectorat.jpg') }}" alt="curte-rectorat" class="rounded-b-2xl" />
                <div
                    class="hidden  md:flex  absolute w-[80%] lg:w-[60%] h-28 bottom-[-4rem] z-10 bg-gray-700 rounded-xl grid grid-cols-3  ">
                    <div class="w-[33%] block px-4 py-4  justify-start  text-white h-full">
                        <h3 class="text-[20px] lg:text-[20px] text-center font-bold ">Unde?</h3>
                        <p class="w-full text-[14px] lg:text-4 pt-[16px] pb-2 text-center font-normal">
                            Splaiul Independenței nr. 313, București</p>
                    </div>
                    <div class="w-[33%] block px-4 py-4 justify-start  text-white h-full  ">
                        <p class="text-[20px] lg:text-[20px] text-center font-bold ">Când?</p>
                        <p class="w-full  text-[14px] lg:text-4 pt-[16px] pb-2 text-center font-normal">
                            14 martie - 20 noiembrie 2024</p>
                    </div>
                    <div class="w-[33%] block px-4 py-4  justify-start  text-white h-full  ">
                        <p class="text-[20px] lg:text-[20px] text-center font-bold ">Cine?</p>
                        <p class="w-full  text-[14px] lg:text-4 pt-[16px] pb-2 text-center font-normal">
                            POLITEHNICA București</p>
                    </div>

                </div>
            </div>
            <div class="w-full p-6 ">
                <h2
                    class=" my-4 md:mt-20 md:mb-8 flex text-center justify-center items-center font-[900] text-[40px]  text-yellow-400 dark:text-white  md:text-5xl">
                    Evenimente</h2>
            </div>
            <div class="max-w-[80rem] mx-auto grid md:grid-cols-2 px-8 lg:px-4 lg:grid-cols-3 gap-8 pb-8">

        @foreach ($events->sortBy('end_date') as $event)
        @if($event->end_date >= now()->toDateString())
        <div class="w-full">
            <a href="{{ url('evenimente',$event->slug) }}"
                class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                <div class="relative">
                    <div class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat "
                        style="background-image: url({{asset($event->thumbnail) }})"></div>
                    <div
                        class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black bg-opacity-[0.6] backdrop-blur-sm ">
                        <h3 class="flex justify-center text-bold text-white  ">
                            {{ ucfirst($event->name) }}
                        </h3>
                        <p
                            class="my-2 hidden opacity-[0.8] lg:block text-align:left text-sm truncate overflow-hidden text-white  ">
                            {{$event->excerpt}}</p>
                    </div>
                </div>
            </a>
            <div class="block  w-full mt-[10px] rounded-xl border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center ">
                <div class="flex flex-col pl-4 py-4 items-left text-sm  ">
                    <a href="{{ url('evenimente',$event->slug) }}"> 
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        <span id="date-{{ $event->id }}"
                            class="pt-[4px] ml-1 text-[16px] font-bold text-white dark:text-white">
                            <script>
                            formatDates('{{ $event->start_date }}', '{{ $event->end_date }}', 'date-{{ $event->id }}');
                            </script>
                        </span>
                    </div>
                    <div class="flex items-top pt-1  mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-200  mt-[2px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <p class=" ml-1 pt-[3px] text-[16px] text-black dark:text-white align-top">
                            {{$event->venue}}
                        </p>
                    </div>
                    </a>
                </div>
                <div class="flex grid gap-y-4 md:grid-cols-2 gap-x-2 pb-4 mr-4 " >
                    <a href="{{ url('evenimente',$event->slug) }}">
                        <p
                            class="ml-4   py-[5px]   rounded-xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                            Detalii
                        </p>
                    </a>
                     @if(Auth::check())
                        @if(Auth::user()->hasTicketForEvent($event->id))
                        <a href="{{ url('/generare-bilet', $event->slug) }}">
                        <p
                            class="ml-4   py-[5px]  rounded-xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                            Vezi biletul
                        </p>
                    </a>
                        @else
                        <a href="{{ url('/generare-bilet', $event->slug) }}">
                        <p
                            class="ml-4   py-[5px]  rounded-xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                            Ia bilet
                        </p>
                    </a>
                        @endif
                    @endif
                    @guest
                    <a href="{{ url('/generare-bilet', $event->slug) }}">
                        <p
                            class="ml-4   py-[5px]  rounded-xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                            Bilete
                        </p>
                    </a>
                    @endguest
                </div>
                
            </div>
        </div>
        @endif
        @endforeach
    </div>
            
        </div>
    </x-app-layout>
</body>

</html>






    <!-- <div class="max-w-[80rem] mx-auto grid md:grid-cols-2 px-2 lg:px-4 lg:grid-cols-3 gap-8">

                @forelse ($events as $event)
                @if($event->date == now()->toDateString())
                <div class="w-full">
                    <a href="{{ url('evenimente',$event->slug) }}"
                        class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <div class="relative">
                            <div class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat "
                                style="background-image: url({{asset($event->thumbnail) }}"></div>
                            <div
                                class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black bg-opacity-[0.6] backdrop-blur-sm ">
                                <h3 class="flex justify-center text-bold text-white  ">
                                    {{ ucfirst($event->name) }}
                                </h3>
                                <p
                                    class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">
                                    {{$event->description}}</p>
                            </div>
                        </div>
                    </a>
                    <div
                        class="flex w-full mt-[10px] rounded-xl border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center ">
                        <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                            <a href="{{ url('evenimente',$event->slug) }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    <span
                                        class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->start_date}}</span>
                                </div>
                                <div class="flex items-top pt-1  mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    <p class=" ml-1 text-[12px] text-black dark:text-white align-top">
                                        {{$event->venue}}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <a href="{{ url('evenimente',$event->slug) }}">
                            <p
                                class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                                Bilete
                            </p>
                        </a>
                    </div>
                </div>
                @endif
                @empty
                @endforelse

                @foreach ($events as $event)
                @if($event->date > now()->toDateString())
                <div class="w-full">
                    <a href="{{ url('evenimente',$event->slug) }}"
                        class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <div class="relative">
                            <div class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat "
                                style="background-image: url({{asset($event->thumbnail) }}"></div>
                            <div
                                class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black bg-opacity-[0.6] backdrop-blur-sm ">
                                <h3 class="flex justify-center text-bold text-white  ">
                                    {{ ucfirst($event->name) }}
                                </h3>
                                <p
                                    class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">
                                    {{$event->description}}</p>
                            </div>
                        </div>
                    </a>
                    <div
                        class="flex w-full mt-[10px] rounded-xl  border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center ">
                        <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                            <a href="{{ url('evenimente',$event->slug) }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    <span
                                        class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->date}}</span>
                                </div>
                                <div class="flex items-top pt-1  mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    <p class=" ml-1 text-[12px] text-black dark:text-white align-top">
                                        {{$event->venue}}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <a href="{{ url('evenimente',$event->slug) }}">
                            <p
                                class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                                Bilete
                            </p>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach

                @foreach ($events->sortByDesc('date') as $event)
                @if($event->date < now()->toDateString())
                    <div class="w-full">
                        <a href="{{ url('evenimente',$event->slug) }}"
                            class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                            <div class="relative">
                                <div class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat "
                                    style="background-image: url({{asset($event->thumbnail) }}"></div>
                                <div
                                    class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black  bg-opacity-[0.6] backdrop-blur-sm ">
                                    <h3 class="flex justify-center text-bold text-white  ">
                                        {{ ucfirst($event->name) }}
                                    </h3>
                                    <p
                                        class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">
                                        {{$event->description}}</p>
                                </div>
                            </div>
                        </a>
                        <div
                            class="flex w-full mt-[10px] rounded-xl  border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center ">
                            <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                                <a href="{{ url('evenimente',$event->slug) }}">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <span
                                            class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->start_date}}</span>
                                    </div>
                                    <div class="flex items-top pt-1  mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        <p class=" ml-1 text-[12px] text-black dark:text-white align-top">
                                            {{$event->venue}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <a href="{{ url('evenimente',$event->slug) }}">
                                <p
                                    class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out">
                                    Bilete
                                </p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div> -->