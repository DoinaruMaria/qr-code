<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilete UNSTPB</title>
    <link href="{{ asset('/css/bileteleMele.css') }}" rel="stylesheet">

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

<body>

    <x-app-layout class="max-w-[80rem] mx-auto ">
        <section
            class="max-w-7xl mx-auto px-8 flex flex-col justify-center items-center md:items-end xl:h-[calc(100vh-97px)]   h-[50rem]">

            <!-- Sectiunea asta trebuie printata -->
            <!-- TICKET -->
            <div id="{{$event->id}}"
                class="relative block md:flex w-full h-[38rem] rounded-xl md:h-[13rem] bg-white mb-8 printable-section">
                <div
                    class="h-[33%] w-full md:w-[30%] md:h-full relative rounded-t-xl md:rounded-l-xl md:rounded-tr-none ticket-event-cover">
                    <img src="{{ asset($event->thumbnail) }}" alt="event-cover"
                        class="h-full w-full rounded-t-xl md:rounded-tr-none md:rounded-bl-xl img-cover">
                </div>
                <div class="w-full h-[33%]  md:w-[45%] p-4 ml-0 md:h-full info-box">
                    <div
                        class="text-black flex flex-col text-center md:justify-between md:text-left items-between h-full content">
                        <div class="flex flex-col info">
                            <h1 class="text-[2rem] font-bold uppercase break-normal event-name">
                                {{ $event->name }}
                            </h1>
                            <span class="text-[1.4rem] font-bold edition">
                                Ediția {{ $event->edition }}

                            </span>
                        </div>
                        <div class="flex flex-col items-center md:items-start md:mt-12 info">
                            <span class="text-[0.75rem] font-semibold flex items-center date">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 calendar-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                                <span id="date-{{$event->id }}" class="pt-1">
                                    <script>
                                    formatDates('{{ $event->start_date }}',
                                        '{{ $event->end_date}}', 'date-{{ $event->id }}'
                                    );
                                    </script>
                                </span>
                            </span>


                            <span class="text-[0.75rem] font-semibold flex items-center mt-1 venue">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 venue-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>

                                {{ $event->venue }}
                            </span>
                        </div>
                    </div>
                </div>
                <div
                    class="py-4 md:py-0 md:pt-0 flex flex-col w-full mb-4 border-t-2 md:mt-0 md:mb-0 md:w-[30%] md:border-t-0 border-l-2 border-dashed qr">
                    {!!
                    QrCode::size(150)->generate(url("http://bilete.upb.ro/bilete/validare/{$user_id}/{$event_id}"));
                    !!}


                    <button id="printButton" onClick="printTicket({{$event->id}})"
                        class="pt-4 md:pt-0 mt-[0.5] h-[1rem] w-[12rem] flex justify-center items-center hover:font-semibold printButton">Descarcă
                        biletul
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="black" class="ml-2 w-[1rem] h-[1rem] hover:font-semibold ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </button>
                </div>

            </div>

            <script>
            function printTicket(sectionId) {
                var printContents = document.getElementById(sectionId).outerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
            </script>
        </section>
    </x-app-layout>

</body>

</html>