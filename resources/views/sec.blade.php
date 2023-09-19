<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <form action="" method="post">
        <label for="id_user">{{$curentUser}}</label>
        <input type="hidden" id="id_user" name="id_user">

        <label for="id_eveniment">{{$events[0]->id}}</label>
        <input type="hidden" id="id_eveniment" name="id_eveniment">

        <label for="data_generare">{{$dataGenerare}}</label>
        <input type="hidden" id="data_generare" name="data_generare">

      </form>
</body>
</html>
