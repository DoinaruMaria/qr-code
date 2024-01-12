<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body>

    <x-app-layout>
        <div class="my-20" style="display: flex; justify-content: center;" >
            {!! QrCode::size(150)->generate('http://127.0.0.1:8000/bilete/validare/{userId}/{eventId}') !!}
        </div>

       <a href="{{ url('/pdf/userPDF') }}"><button class="bg-violet-900 px-[5rem] py-[1rem] uppercase text-white text-4 rounded">Download</button></a>
        
    </x-app-layout>

</body>
</html>