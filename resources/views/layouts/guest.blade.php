<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bilete Evenimente UPB') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-900 h-screen w-screen flex justify-center items-center">
    <div class="bg-gray-800 h-screen w-screen md:max-w-[70%] md:h-[90%] mx-auto my-auto md:rounded-xl">
        <div class="p-8 h-full w-full">
            <a href="/">
                <x-application-logo class="w-4 h-4 text-gray-500 p-8" />
            </a>
            <div class="grid grid-cols-1 lg:grid-cols-2 mt-4">
                <div>
                    <p class="text-white text-[2.2rem]">Conectați-vă</p>
                </div>

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</body>

</html>