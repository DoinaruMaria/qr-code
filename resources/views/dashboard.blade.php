<x-app-layout class="max-w-[80rem] mx-auto  " >
    
    <h2 class="m-16 text-center font-[900] text-yellow-400 dark:text-white  text-5xl">Evenimente</h2>

    <div class="max-w-[80rem] mx-auto grid md:grid-cols-2 px-8 lg:px-4 lg:grid-cols-3 gap-8">
            @forelse ($events as $event)
                @if($event->date == now()->toDateString())
                    <div class="w-full" >
                    <a href="{{ url('evenimente',$event->id) }}" class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <div class="relative" >
                            <div  class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat " 
                            style="background-image: url({{ asset('img/spacefestt.png') }}"
                            ></div>
                            <div  class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black bg-opacity-[0.6] backdrop-blur-sm ">
                                <h3 class="flex justify-center text-bold text-white  " >
                                   {{ ucfirst($event->name) }}
                                </h3>
                                <p class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">{{$event->description}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex w-full mt-[10px] rounded-xl border border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center " >
                        <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                            <div class="flex items-center" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <span class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->date}}</span>
                            </div>
                            <div class="flex items-top pt-1  mr-4" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <p class=" ml-1 text-[12px] text-black dark:text-white align-top" >
                                    {{$event->venue}}
                                </p>
                            </div>
                        </div>
                        <a href="{{ url('evenimente',$event->id) }}"  >
                            <p class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
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
                    <div class="w-full" >
                    <a href="{{ url('evenimente',$event->id) }}" class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <div class="relative" >
                            <div  class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat " 
                            style="background-image: url({{ asset('img/spacefestt.png') }}"
                            ></div>
                            <div  class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black bg-opacity-[0.6] backdrop-blur-sm ">
                                <h3 class="flex justify-center text-bold text-white  " >
                                   {{ ucfirst($event->name) }}
                                </h3>
                                <p class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">{{$event->description}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex w-full mt-[10px] rounded-xl border border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center " >
                        <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                            <div class="flex items-center" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <span class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->date}}</span>
                            </div>
                            <div class="flex items-top pt-1  mr-4" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <p class=" ml-1 text-[12px] text-black dark:text-white align-top" >
                                    {{$event->venue}}
                                </p>
                            </div>
                        </div>
                        <a href="{{ url('evenimente',$event->id) }}"  >
                            <p class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] ">
                                Bilete
                            </p>
                        </a>
                    </div>  
                </div>
                @endif
            @endforeach

            @foreach ($events->sortByDesc('date') as $event)
                @if($event->date < now()->toDateString())
                <div class="w-full" >
                    <a href="{{ url('evenimente',$event->id) }}" class=" h-150 flex flex-col text-gray-900 dark:text-gray-100">
                        <div class="relative" >
                            <div  class="w-full h-[250px] lg:h-[350px] rounded-xl relative bg-cover bg-center bg-no-repeat " 
                            style="background-image: url({{ asset('img/spacefestt.png') }}"
                            ></div>
                            <div  class="py-2 px-4 text-xl w-full font-semibold rounded-b-xl leading-tight absolute bottom-0 bg-black  bg-opacity-[0.6] backdrop-blur-sm ">
                                <h3 class="flex justify-center text-bold text-white  " >
                                   {{ ucfirst($event->name) }}
                                </h3>
                                <p class="my-2 hidden  opacity-[0.8]  text-sm truncate overflow-hidden text-white lg:block ">{{$event->description}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="flex w-full mt-[10px] rounded-xl border border-gray-200 dark:border-slate-700 border-[0.5px] justify-between items-center " >
                        <div class="flex flex-col pl-4 py-2 items-left text-sm  ">
                            <div class="flex items-center" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <span class="pt-[4px] ml-1 text-[16px] font-bold text-black dark:text-white ">{{$event->date}}</span>
                            </div>
                            <div class="flex items-top pt-1  mr-4" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500 dark:text-gray-200  mt-[2px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <p class=" ml-1 text-[12px] text-black dark:text-white align-top" >
                                    {{$event->venue}}
                                </p>
                            </div>
                        </div>
                        <a href="{{ url('evenimente',$event->id) }}"  >
                            <p class="mr-4 px-[25px] py-2 my-[10px] rounded-2xl  items-center justify-center text-center flex text-white bg-black hover:bg-opacity-[0.8] dark:text-black dark:bg-white dark:hover:bg-opacity-[0.8] transition-all duration-300 ease-in-out">
                                Bilete
                            </p>
                        </a>
                    </div>  
                </div>
                @endif
            @endforeach
    </div>

    <!-- <button name="loadMore" value="clicked" class="mt-10 mx-auto flex justify-center p-3 text-gray-400 text-xs font-semibold border-gray-300 border-[1px] sm:rounded-md hover:bg-yellow-400 hover:text-white hover:border-yellow-400 ">MAI MULTE</button> -->



    <div class="mt-10 bg-gray-100 dark:bg-[#111827] max-w-[80rem] mx-auto ">
        <div class="py-8 block w-64 lg:w-full lg:flex mx-auto lg:justify-center">
            <div class="lg:mr-8 mb-8 lg:mb-0 w-64 p-2 bg-white flex justify-center items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400 dark:bg-white  dark:hover:bg-gray-300 transition-all duration-300 ease-in-out ">
                 <a href = "{{ url('evenimente-curente')}}" class="w-64 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> în desfășurare</a>
            </div>
            <div class="lg:mr-8 mb-8 lg:mb-0 p-2 bg-white flex justify-center items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400 dark:bg-white  dark:hover:bg-gray-300 transition-all duration-300 ease-in-out">
                <a href = "{{ url('evenimente-viitoare')}}" class="w-64 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> viitoare</a>
            </div>
            <div class=" p-2 mb-8 lg:mb-0 bg-white flex justify-center items-center sm:rounded-lg bg-yellow-300 hover:bg-yellow-400 dark:bg-white  dark:hover:bg-gray-300 transition-all duration-300 ease-in-out">
                <a href = "{{ url('evenimente-incheiate')}}" class="w-64 p-5 border-dashed border-2 border-black text-center sm:rounded-lg">Evenimente<br> încheiate</a> 
            </div>
        </div>
    </div>

</x-app-layout>