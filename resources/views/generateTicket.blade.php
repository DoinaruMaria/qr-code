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

        <div class="my-20" style="display: flex; justify-content: center;" >       
        </div>
        
    </x-app-layout>

</body>
</html>