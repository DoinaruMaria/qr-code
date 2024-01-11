
<html>
    <head>
        <link href="{{ asset('/css/bileteleMele.css') }}" rel="stylesheet">
    </head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Biletele mele</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               @foreach($myTickets as $myTicket)
                <section id="section" >
                    <div id="printableSection">
                        <div id="container-left"></div>
                            <div id="container-middle">
                            <div id="content">
                                <div id="info">
                                    <h1 id="header">
                                        SpaceFest
                                    </h1>
                                    <span id="edition">
                                        Editia 2024
                                    </span>
                                </div>
                                <div id="info">
                                    <span id="date">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="calendar-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                        23.09.2024
                                    </span>
                                    <span id="location">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="location-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        Aula Magna UPB
                                    </span>
                                </div>
                            </div>
                        </div>
                    <div id="qr" >
                        {!! QrCode::size(150)->generate('http://127.0.0.1:8000/bilete/validare/{userId}/{eventId}') !!}
                    </div>
            </div>
            
            
        </section>
                @endforeach
            </div>
        </div>
    
</x-app-layout>
</body>
<html>