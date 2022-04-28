<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">

    <div class="container mx-auto px-4">
        <h1>Štatistika</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th colspan="2">Štát</th>
                <th>Kód</th>
                <th>Počet</th>
            </tr>

        </thead>
        @foreach ($queryRes as $item)
        <tr>
            
            <td><a href="stats/{{ $item->country }}">{{ $item->country }}</a></td>
            <td><img src="http://www.geonames.org/flags/x/{{ $item->alphacode }}.gif" alt="http://www.geonames.org/flags/x/{{ $item->alphacode }}.gif" width="30"></td>
            <td>{{ $item->alphacode }}</td>
            <td>{{ $item->count }}</td>
            
        </tr>
            
        @endforeach

    </table>
   

</body>
</html>
