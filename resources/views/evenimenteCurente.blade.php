<x-app-layout>
    @forelse ($events as $event)
        @if($event->date == now()->toDateString())
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div>
                            <h2 class="p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Evenimente in desfasurare</h2>
                            <div class="p-6 text-gray-900 dark:text-gray-100" style="display: flex; justify-content: space-between">
                                <a href="{{ url('evenimente',$event->id) }}">
                                    {{ ucfirst($event->name) }}
                                </a>
                                <span class="text-red-500">{{$event->date}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @empty
    @endforelse
</x-app-layout>