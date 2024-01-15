<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body>

    <x-app-layout>
        <section class="max-w-[54rem] mx-auto flex flex-col justify-center items-center h-[calc(100vh-97px)]">
            <div id="printableSection" class="flex w-full h-[13rem] bg-white">
                <div class="h-full w-[30%] relative bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset('img/spacefest.png') }}"></div>
                <div class="w-[40%] p-4 h-full">
                    <div class="text-black flex flex-col justify-between items-between h-full">
                        <div class="flex flex-col">
                            <h1 class="text-[2rem] font-bold uppercase">
                                {{ $event->name }}
                            </h1>
                            <span class="text-[1.4rem] font-bold">
                                Ediția {{ $event->edition }}
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[0.75rem] font-semibold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                                {{ $event->date }}
                            </span>
                            <span class="text-[0.75rem] font-semibold flex items-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>

                                {{ $event->venue }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="relative w-[30%] flex justify-center items-center border-l-2 border-dashed">
                    {!! QrCode::size(150)->generate('http://127.0.0.1:8000/bilete/validare/{userId}/{eventId}') !!}
                    <button id="printButton" class="absolute top-0 right-0 bg-black h-[2rem] w-[2rem] flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </button>
                </div>

            </div>
            <script>
                document.getElementById('printButton').addEventListener('click', function() {
                    printSection('printableSection');
                });

                function printSection(sectionId) {
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