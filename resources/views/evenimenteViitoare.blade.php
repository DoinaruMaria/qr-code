<x-app-layout>
    <div class="py-12" id='evenimente_viitoare'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div>
                    <h2 class="p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Evenimente viitoare</h2>
                    @foreach ($events as $event)
                        @if($event->date > now()->toDateString())
                            <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                                <a href="{{ url('evenimente',$event->id) }}">
                                    {{ ucfirst($event->name) }}
                                </a>
                                <span class="text-red-500">{{$event->date}}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>