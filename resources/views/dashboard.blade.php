<x-app-layout>
    
    <h2 class="m-16 text-center font-semibold text-yellow-400 text-5xl">Evenimente</h2>

    <div class="max-w-7xl mx-auto grid grid-cols-3 gap-4">
            @forelse ($events as $event)
                @if($event->data == now()->toDateString())
                    <div class="p-6 h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <img src="{{ asset('img/Event.jpg') }}" class="w-full h-52" alt="">
                        <a href="{{ url('evenimente',$event->id) }}" class="py-2 text-xl font-semibold leading-tight">
                            {{ ucfirst($event->nume) }}
                        </a>
                        <div class="flex flex-row gap-2 items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <span class="pt-1.5">{{$event->data}}</span>
                        </div>
                        <p class="mt-2 text-sm">{{$event->descriere}}</p>
                @endif
                @empty
            @endforelse

            @foreach ($events as $event)
                @if($event->data > now()->toDateString())
                    <div class="p-6 h-80 flex flex-col text-gray-900 dark:text-gray-100">
                        <img src="{{ asset('img/Event.jpg') }}" class="w-full h-52" alt="">
                        <a href="{{ url('evenimente',$event->id) }}" class="py-2 text-xl font-semibold leading-tight">
                            {{ ucfirst($event->nume) }}
                        </a>
                        <div class="flex flex-row gap-2 items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <span class="pt-1.5">{{$event->data}}</span>
                        </div>
                        <p class="mt-2 text-sm">{{$event->descriere}}</p>
                    </div>
                @endif
            @endforeach

            @foreach ($events->sortByDesc('data') as $event)
                @if($event->data < now()->toDateString())
                    <div class="p-6 h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <img src="{{ asset('img/Event.jpg') }}" class="w-full h-52" alt="">
                        <a href="{{ url('evenimente',$event->id) }}" class="py-2 text-xl font-semibold leading-tight">
                            {{ ucfirst($event->nume) }}
                        </a>
                        <div class="flex flex-row gap-2 items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <span class="pt-1.5">{{$event->data}}</span>
                        </div>
                        <p class="mt-2 text-sm">{{$event->descriere}}</p>
                    </div>
                @endif
            @endforeach
    </div>

    <button name="loadMore" value="clicked" class="mt-10 mx-auto flex justify-center p-3 text-gray-400 text-xs font-semibold border-gray-300 border-[1px] sm:rounded-md hover:bg-yellow-400 hover:text-white hover:border-yellow-400 ">MAI MULTE</button>



    <div class="mt-10 bg-gray-100">
        <div class="py-12 flex justify-center gap-x-10 font-semibold text-xl leading-tight">
            <div class="w-64 p-2 bg-white flex items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400">
                 <a href = "{{ url('evenimenteCurente')}}" class="w-60 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> în desfășurare</a>
            </div>
            <div class="w-64 p-2 bg-white flex items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400">
                <a href = "{{ url('evenimenteViitoare')}}" class="w-60 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> viitoare</a>
            </div>
            <div class="w-64 p-2 bg-white flex items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400">
                <a href = "{{ url('evenimenteIncheiate')}}" class="w-60 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> încheiate</a> 
            </div>
        </div>
    </div>

</x-app-layout>