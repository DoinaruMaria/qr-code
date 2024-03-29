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

<body class="font-sans text-gray-900 antialiased bg-gray-900 h-screen w-screen">
    <div class="flex flex-col justify-center items-center md:pt-10">
        <div
            class="bg-gray-800 min-h-screen w-screen md:max-w-screen-md lg:max-w-xl lg:h-[50%] mx-auto md:rounded-xl px-8 md:py-8 md:mb-[3rem]">
            <div class="mt-8 lg:mt-0">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>