<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eveniment</title>
</head>
<body>
    <div class="py-12">
        <form action method>
            <div>
                <p>Current User ID: {{$curentUser}}</p>
                
                <table border="1">
                <tr>
                    <td>
                        <td>nume</td>
                        <td>data</td>
                        <td>descriere</td>
                        <td>editie</td>
                    </td>
                </tr>
                @foreach ($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->nume}}</td>
                    <td>{{$event->data}}</td>
                    <td>{{$event->descriere}}</td>
                    <td>{{$event->editie}}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </form>
    </div>
</body>
</html>