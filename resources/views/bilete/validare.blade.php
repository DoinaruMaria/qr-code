<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <title>Document</title> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    
</head>
<body>

    <x-app-layout>
        <div class="text-center bg-white mt-20 m-auto py-5">
           <p> Ticket Id: {{$isTicket->id}}</p>
           <p> User Id: {{$isTicket->id_user}}</p>
           <p> Evenimet Id: {{$isTicket->id_eveniment}}</p>
        </div>
    </x-app-layout>
</body>
</html>